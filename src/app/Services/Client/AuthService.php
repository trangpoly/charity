<?php

namespace App\Services\Client;

use App\Repositories\Client\AuthRepository;
use App\Repositories\Client\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function generateOtp($request)
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

            $this->authRepository->generateOtp($data);

            return false;
        } else {
            return true;
        }
    }

    public function checkOtp($request)
    {
        $inputOtp = $request->otp;

        if (! $this->authRepository->checkOtp($inputOtp)) {
            $dataRegister = $this->authRepository->getData($inputOtp);
            $expiresOtp = $dataRegister->expires_at;
            $otpYearCalc = now()->diffInYears($expiresOtp);
            $otpMonthCalc = now()->diffInMonths($expiresOtp);
            $otpDayCalc = now()->diffInDays($expiresOtp);
            $otpMinutesCalc = now()->diffInMinutes($expiresOtp);

            if ($otpYearCalc == 0 && $otpMonthCalc == 0 && $otpDayCalc == 0 && $otpMinutesCalc < 10) {
                $data = [
                    'phone_number' => $dataRegister->phone_number,
                ];

                $this->authRepository->register($data);

                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
}
