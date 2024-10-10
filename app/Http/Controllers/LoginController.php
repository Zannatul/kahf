<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Services\ServiceInterfaces\UserLoginServiceInterface;

class LoginController extends Controller
{
    // Injecting the user login service into the controller
    protected $userLoginService;

    /**
     * Constructor to initialize dependencies
     * 
     * @param UserLoginServiceInterface $userLoginService
     */
    public function __construct(UserLoginServiceInterface $userLoginService)
    {
        $this->userLoginService = $userLoginService;
    }

    /**
     * Show the login form to the user
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Process the user login request
     *
     * @param UserLoginRequest $request - Validated request data for login
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginProcess(UserLoginRequest $request)
    {
        // Calling the login service to authenticate the user
        $isLoggedIn = $this->userLoginService->login($request);

        // If authentication is successful, redirect to the user profile with a success message
        if ($isLoggedIn) {
            return redirect()->to('user/profile')->with('success', 'User Login success!!.');
        }

        // If authentication fails, redirect back to the login form with an error message
        return redirect()->back()->with('error', 'Credentials Not Matched!!');
    }

    /**
     * Logout the authenticated user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Log out the user from the current session
        Auth::logout();

        // Redirect to the homepage after logging out
        return redirect('/');
    }
}
