<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ContactRequest;
use App\Services\Client\ContactService;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    protected $contactService;


    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function formContact()
    {
        return view('pages.contact');
    }

    public function saveContact(ContactRequest $request)
    {
        $this->contactService->saveContact($request);

        session(['msg' => 'Đã gửi phản hồi của bạn']);

        return redirect()->route('web.client.formContact');
    }

    public function list()
    {
        $contacts = $this->contactService->list();

        return view('admin.contacts.list', ['contacts' => $contacts]);
    }

    public function delete($id)
    {
        $this->contactService->delete($id);

        session(['msg' => 'Xóa thành công']);

        return redirect()->back();
    }
}
