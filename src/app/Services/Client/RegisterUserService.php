<?php

namespace App\Services\Client;

use App\Repositories\Client\RegisterUserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterUserService
{
    protected $registerUserRepository;

    public function __construct(RegisterUserRepositoryInterface $registerUserRepository)
    {
        $this->registerUserRepository = $registerUserRepository;
    }

    public function generateOTP($request)
    {
        $validatePhoneNumber = $request->validate([
            'phone_number' => 'bail|required|regex:/^(0[3-5-7-8-9])+([0-9]{8})$/'
        ]);

        if ($validatePhoneNumber) {
            $data = [
                'phone_number' => $request->phone_number,
                'otp' => random_int(100000, 999999),
                'expires_at' => now()->addMinutes(10),
            ];

            $this->registerUserRepository->generateOTP($data);

            return false;
        } else {
            return true;
        }
    }

    public function checkOTP($request)
    {
        $inputOTP = $request->otp;

        if (! $this->registerUserRepository->checkOTP($inputOTP)) {
            $dataRegister = $this->registerUserRepository->getData($inputOTP);
            $expiresOtp = $dataRegister->expires_at;
            $otpYearCalc = now()->diffInYears($expiresOtp);
            $otpMonthCalc = now()->diffInMonths($expiresOtp);
            $otpDayCalc = now()->diffInDays($expiresOtp);
            $otpMinutesCalc = now()->diffInMinutes($expiresOtp);

            if ($otpYearCalc == 0 && $otpMonthCalc == 0 && $otpDayCalc == 0 && $otpMinutesCalc < 10) {
                $data = [
                    'phone_number' => $dataRegister->phone_number,
                    'password' => Hash::make('ABCD9876'),
                ];

                $this->registerUserRepository->register($data);
                $this->registerUserRepository->deleteOTP($inputOTP);

                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
}
