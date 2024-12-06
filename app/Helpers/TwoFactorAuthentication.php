<?php

namespace App\Helpers;

class TwoFactorAuthentication
{
    // Generate a 6-digit numeric OTP
    public static function generateOTP()
    {
        return random_int(100000, 999999); // Generates a random 6-digit number
    }
}
