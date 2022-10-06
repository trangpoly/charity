<?php

namespace App\Repositories\Client;

interface AuthRepositoryInterface
{
    public function generateOtp($data);

    public function checkOtp($inputOtp);

    public function getData($inputOtp);

    public function register($data);
}
