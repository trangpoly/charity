<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showCreateForm()
    {
        return view('admin.pages.user.add');
    }

    public function storeUser(UserRequest $request)
    {
        $this->userService->create($request);
        session(['msg' => 'Create user successfully !']);
        session(['status' => false]);

        return redirect()->route('web.admin.user.list');
    }

    public function showEditForm($id)
    {
        $user = $this->userService->getUser($id);

        return view('admin.pages.user.edit')->with('user', $user);
    }

    public function updateUser(UserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        session(['msg' => 'Update user successfully !']);
        session(['status' => false]);

        return redirect()->route('web.admin.user.list');
    }

    public function deactivateUser($id)
    {
        $this->userService->deactivateUser($id);
        session(['msg' => 'Deactivate user successfully !']);
        session(['status' => true]);

        return redirect()->route('web.admin.user.list');
    }

    public function deactivateAccount(Request $request)
    {
        $userId = Auth::user()->id;
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $this->userService->deactivateUser($userId);

        return redirect()->route('home');
    }
}
