<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Services\UserService;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUsers()
    {
        $users = $this->userService->getUsers();

        return view('admin.pages.user.list')->with('users', $users);
    }
}
