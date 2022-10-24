<?php

namespace App\Services;

use App\Http\Requests\admin\AccountRequest;
use App\Http\Requests\admin\AccountUpdateRequest;
use App\Repositories\Account\AccountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountService extends BaseService
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    public function list()
    {
        return $this->accountRepository->list();
    }

    public function saveCreate(AccountRequest $request)
    {
        $attribute = [
            'name' => $request->name,
            'account' => $request->account,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
        ];

        return $this->accountRepository->create($attribute);
    }

    public function update($id)
    {
        return $this->accountRepository->find($id);
    }

    public function saveUpdate($id, $request)
    {
        $attribute = [
            'name' => $request->name,
            'account' => $request->account,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
        ];

        return $this->accountRepository->update($id, $attribute);
    }

    public function delete($id)
    {
        return $this->accountRepository->delete($id);
    }

}
