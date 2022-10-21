<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
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
        $attribute['status'] = 1;

        $user = $this->userRepository->create($attribute);

        if ($request->status == 0) {
            $this->userRepository->delete($user->id);
        }
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
            'status' => 1,
            'facebook_id' => $request->facebook_id,
            'google_id' => $request->google_id,
        ];

        $this->userRepository->update($id, $attribute);

        if ($request->status == 0) {
            $this->userRepository->delete($id);
        } else {
            $this->userRepository->restore($id);
        }
    }

    public function deactivateUser($id)
    {
        $this->userRepository->delete($id);
    }
}
