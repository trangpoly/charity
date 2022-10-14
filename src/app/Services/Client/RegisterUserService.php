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
        $data = [
            'phone_number' => $request->phone_number,
            'otp' => random_int(100000, 999999),
            'expires_at' => now()->addMinutes(10),
        ];

        $this->registerUserRepository->generateOTP($data);

        return false;
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
                    'password' => Hash::make('user'),
                    'status' => 1
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
