<?php

namespace App\Services\ServiceInterfaces;

interface UserLoginServiceInterface
{
    /**
     * Handle the user login process
     * 
     * @param \Illuminate\Http\Request $request - The request object containing user credentials
     * @return bool - Returns true if login is successful, otherwise false
     */
    public function login($request);
}
