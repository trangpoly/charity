<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationOtp;
use App\Services\Client\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
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

    public function generateOtp(Request $request)
    {
        $status = $this->authService->generateOtp($request);
        $msg = $status ? 'Gửi OTP thất bại !' : 'OTP xác nhận đã được gửi vào số điện thoại của bạn !';

        return redirect()->route('charity.register.verify')->with(['msg' => $msg, 'status' => $status]);
    }

    public function checkOtp(Request $request)
    {
        $status = $this->authService->checkOtp($request);
    }
}
