<?php

namespace App\Services\Services;

use App\Services\ServiceInterfaces\UserLoginServiceInterface;

class UserLoginService implements UserLoginServiceInterface
{
    /**
     * Attempt to log in a user using their national ID and password
     *
     * @param \Illuminate\Http\Request $request - The request object containing user credentials
     * @return bool - Returns true if the login attempt is successful, otherwise false
     */
    public function login($request)
    {
        // Attempt to log in using the provided national ID and password
        $isLoggedIn = auth()->attempt(['national_id' => $request->national_id, 'password' => $request->password]);

        // Return the result of the login attempt
        return $isLoggedIn; // This will return true if logged in successfully, false otherwise
    }
}
