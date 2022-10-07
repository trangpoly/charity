<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Client\Auth\FormRegisterRequest;
use App\Services\Client\AuthService;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showFormRegister()
    {
        return view('client.auth.register');
    }

    public function showFormOtpVerify()
    {
        return view('client.auth.phone-otp-verify');
    }

    public function generateOtp(FormRegisterRequest $request)
    {
        $status = $this->authService->generateOtp($request);
        $msg = $status ? 'Gửi OTP thất bại !' : 'OTP xác nhận đã được gửi vào số điện thoại của bạn !';

        return redirect()->route('charity.register.verify')->with(['msg' => $msg, 'status' => $status]);
    }

    public function checkOtp(Request $request)
    {
        $status = $this->authService->checkOtp($request);
        $msg = $status ? 'Đăng ký không thành công ! Hãy chắc chắn bạn làm đúng các bước theo hướng dẫn' : 'Đăng ký thành công';

        return redirect()->route('home')->with(['msg' => $msg, 'status' => $status]);
    }
}
