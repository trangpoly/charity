<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Auth\PhoneOtpRequest;
use App\Models\User;
use App\Models\VerificationOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthSessionController extends BaseController
{
    public $verificationOtpModel;
    public $userpModel;

    public function __construct(VerificationOtp $verificationOtpModel, User $userpModel)
    {
        $this->verificationOtpModel = $verificationOtpModel;
        $this->userpModel = $userpModel;
    }

    public function showFormLogin()
    {
        return view('auth.login-otp');
    }

    public function otpVerify()
    {
        return view('auth.login-otp-verify');
    }

    public function generateOtp(PhoneOtpRequest $request)
    {
        $phoneNumber = $request->phone_number;
        $checkPhoneNumber = $this->userpModel->where('phone_number', $phoneNumber)->first();

        if ($checkPhoneNumber) {
            $otpData = [
                'phone_number' => $request->phone_number,
                'otp' => random_int(100000, 999999),
                'expires_at' => now()->addMinutes(10),
            ];

            $this->verificationOtpModel->create($otpData);

            return redirect()->route('web.login.otp-verify');
        }

        return redirect()->route('web.login.show')->with('msg', 'Số điện thoại này chưa được đăng ký !');
    }

    public function login(Request $request)
    {
        $phoneNumber = $this->verificationOtpModel->where('otp', $request->otp)->first();
        $phoneNumber = $phoneNumber->phone_number;
        $user = $this->userpModel->where('phone_number', $phoneNumber)->first();
        if ($user) {
            Auth::login($user);
            $this->verificationOtpModel->where('otp', $request->otp)
                ->where('phone_number', $phoneNumber)
                ->delete();
            $this->userpModel->where('id', Auth::user()->id)->update(['lastLogin' => Carbon::now()]);

            return redirect()->route('home');
        }

        return redirect()->route('web.login.otp-verify')->with('msg', 'OTP incorrect');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect()->route('home');
    }
}
