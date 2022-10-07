<?php

namespace App\Repositories\Client;

interface RegisterUserRepositoryInterface
{
    public function generateOTP($data);

    public function checkOTP($inputOTP);

    public function getData($inputOTP);

    public function register($data);

    public function deleteOTP($inputOTP);
}
