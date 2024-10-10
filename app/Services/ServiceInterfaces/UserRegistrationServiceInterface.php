<?php

namespace App\Services\ServiceInterfaces;

interface UserRegistrationServiceInterface
{
    /**
     * Handle the user registration process
     * 
     * @param array $userData - An associative array containing user registration data
     * @return bool - Returns true if registration is successful, otherwise false
     */
    public function registerUser($userData);
}
