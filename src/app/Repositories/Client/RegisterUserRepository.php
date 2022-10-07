<?php

namespace App\Repositories\Client;

use App\Models\User;
use App\Models\VerificationOtp;

class RegisterUserRepository implements RegisterUserRepositoryInterface
{
    protected $verificationOTPModel;
    protected $userModel;

    public function __construct(VerificationOtp $verificationOTPModel, User $userModel)
    {
        $this->verificationOTPModel = $verificationOTPModel;
        $this->userModel = $userModel;
    }

    public function generateOTP($data)
    {
        return $this->verificationOTPModel->create($data);
    }

    public function checkOTP($inputOTP)
    {
        $this->verificationOTPModel->where('otp', $inputOTP);

        return false;
    }

    public function getData($inputOTP)
    {
        return $this->verificationOTPModel->where('otp', $inputOTP)->first();
    }

    public function register($data)
    {
        $this->userModel->create($data);
    }

    public function deleteOTP($inputOTP)
    {
        $this->verificationOTPModel->where('otp', $inputOTP)->delete();
    }
}
