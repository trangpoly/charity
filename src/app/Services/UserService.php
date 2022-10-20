<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        return $this->userRepository->all();
    }

    public function create($request)
    {
        $attribute = $request->all();
        $attribute['password'] = Hash::make('user');

        $this->userRepository->create($attribute);
    }

    public function getUser($id)
    {
        return $this->userRepository->find($id);
    }

    public function updateUser($request, $id)
    {
        $attribute = [
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'status' => $request->status,
            'facebook_id' => $request->facebook_id,
            'google_id' => $request->google_id,
        ];

        $this->userRepository->update($id, $attribute);
    }

    public function deactivateUser($id)
    {
        $this->userRepository->update($id, ['status' => 0]);
    }
}
