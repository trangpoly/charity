<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Client\Auth\FormRegisterRequest;
use App\Services\Client\RegisterUserService;
use Illuminate\Http\Request;

class RegisterUserController extends BaseController
{
    public $registerUserService;

    public function __construct(RegisterUserService $registerUserService)
    {
        $this->registerUserService = $registerUserService;
    }

    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function showFormOtpVerify()
    {
        return view('auth.phone-otp-verify');
    }

    public function generateOTP(FormRegisterRequest $request)
    {
        $status = $this->registerUserService->generateOTP($request);
        $msg = $status ? 'Gửi OTP thất bại !' : 'OTP xác nhận đã được gửi vào số điện thoại của bạn !';

        return redirect()->route('web.register.verify')->with(['msg' => $msg, 'status' => $status]);
    }

    public function checkOTP(Request $request)
    {
        $status = $this->registerUserService->checkOTP($request);
        $msg = $status ? 'Đăng ký thất bại !' : 'Đăng ký thành công';
        return redirect()->route('web.login.show')->with(['msg' => $msg, 'status' => $status]);
    }
}
