<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerificationOtp;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $model;

    public function __construct(VerificationOtp $model)
    {
        $this->model = $model;
    }

    public function showFormRegister()
    {
        return view('client.auth.register');
    }

    public function register(Request $request)
    {
        $validatePhoneNumber = $request->validate([
            'phone_number' => 'bail|required|regex:/^(0[3-5-7-8-9])+([0-9]{8})$/'
        ]);

        if ($validatePhoneNumber)
        {
            $data = [
                'phone_number' => (int) $request->phone_number,
                'otp' => random_int(100000, 999999),
                'expires_at' => now()->addMinutes(10),
            ];

            $this->model->create($data);

            return redirect()->route('charity.register.verify');
        }
    }

    public function showFormOtpVerify()
    {
        return view('client.auth.phone-otp-verify');
    }

    public function checkOtp(Request $request)
    {
        $inputOtp = $request->otp;

        if ($this->model->where('otp', $inputOtp)) {
            $dataRegister = $this->model->where('otp', $inputOtp)->first();
            $expiresOtp = $dataRegister->expires_at;
            $otpYearCalc = now()->diffInYears($expiresOtp);
            $otpMonthCalc = now()->diffInMonths($expiresOtp);
            $otpDayCalc = now()->diffInDays($expiresOtp);
            $otpMinutesCalc = now()->diffInMinutes($expiresOtp);

            if ($otpYearCalc == 0 && $otpMonthCalc == 0 && $otpDayCalc == 0 && $otpMinutesCalc < 10) {
                dd('Register successfully');
            } else {
                dd('Otp was expired, Resend otp ?');
            }
        } else {
            dd('failed');
        }
    }
}
