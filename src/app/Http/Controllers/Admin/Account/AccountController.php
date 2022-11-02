<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\BaseController;
use App\Http\Requests\admin\AccountRequest;
use App\Http\Requests\admin\AccountUpdateRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function list()
    {
        $accounts = $this->accountService->list();

        return view('admin.account.list', ['accounts' => $accounts]);
    }

    public function create()
    {
        return view('admin.account.create');
    }

    public function saveCreate(AccountRequest $request)
    {
        $this->accountService->saveCreate($request);

        session(['msg' => 'Thêm thành công!']);

        session(['status' => false]);

        return redirect()->route('web.admin.account.list');
    }

    public function update($id)
    {
        $account = $this->accountService->update($id);

        return view('admin.account.update', ['account' => $account]);
    }

    public function saveUpdate($id, AccountRequest $request)
    {
        $this->accountService->saveUpdate($id, $request);

        session(['msg' => 'Cập nhật thành công!']);

        session(['status' => false]);

        return redirect()->route('web.admin.account.list');
    }

    public function delete($id)
    {
        $this->accountService->delete($id);

        session(['msg' => 'Xóa thành công!']);

        session(['status' => false]);

        return redirect()->back();
    }
}
