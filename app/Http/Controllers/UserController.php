<?php

namespace App\Http\Controllers;

use App\Services\ServiceInterfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Injecting the UserService into the controller
    protected $userService;

    /**
     * Constructor to initialize dependencies
     * 
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        // Assigning the injected service to the class property
        $this->userService = $userService;
    }

    /**
     * Display the user's profile information
     * 
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        // Fetching the user's profile information using the UserService
        $userProfileData = $this->userService->getProfileInfomation();

        // Passing the profile data to the 'user_profile' view
        return view('user_profile', ['profile' => $userProfileData]);
    }
}
