<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->user = Auth::user();
    //         return $next($request);
    //     });
    // }

    public function create()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only([
            'account',
            'password',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('web.admin.dashboard');
        }

        return back()->with([
            'message' => 'Sai tên đăng nhập hoặc mật khẩu',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('web.admin.login.create');
    }
}
