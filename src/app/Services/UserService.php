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
}
