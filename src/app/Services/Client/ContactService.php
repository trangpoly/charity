<?php

namespace App\Services\Client;

use App\Repositories\Contact\ContactRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactService extends BaseService
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function saveContact($request)
    {
        $attribute = $request->all();

        return $this->contactRepository->create($attribute);
    }

    public function list()
    {
        return $this->contactRepository->all();
    }

    public function delete($id)
    {
        return $this->contactRepository->delete($id);
    }
}
