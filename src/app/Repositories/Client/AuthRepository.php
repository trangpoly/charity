<?php

namespace App\Repositories\Client;

use App\Models\User;
use App\Models\VerificationOtp;

class AuthRepository implements AuthRepositoryInterface
{
    protected $verificationOtpModel;
    protected $userModel;

    public function __construct(VerificationOtp $verificationOtpModel, User $userModel)
    {
        $this->verificationOtpModel = $verificationOtpModel;
        $this->userModel = $userModel;
    }

    public function generateOtp($data)
    {
        return $this->verificationOtpModel->create($data);
    }

    public function checkOtp($inputOtp)
    {
        $this->verificationOtpModel->where('otp', $inputOtp);

        return false;
    }

    public function getData($inputOtp)
    {
        return $this->verificationOtpModel->where('otp', $inputOtp)->first();
    }

    public function register($data)
    {
        $this->userModel->create($data);
    }
}
