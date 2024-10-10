<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\ServiceInterfaces\UserLoginServiceInterface;
use App\Services\ServiceInterfaces\VaccineCenterServiceInterface;
use App\Services\ServiceInterfaces\UserRegistrationServiceInterface;


class UserRegistrationController extends Controller
{
    // Service layer dependencies to handle registration, login, and vaccine center operations
    protected $userLoginService;
    protected $vaccineCenterService;
    protected $userRegistrationService;

    /**
     * Constructor to initialize services
     * 
     * @param VaccineCenterServiceInterface $vaccineCenterService
     * @param UserRegistrationServiceInterface $userRegistrationService
     * @param UserLoginServiceInterface $userLoginService
     */
    public function __construct(
        VaccineCenterServiceInterface $vaccineCenterService,
        UserRegistrationServiceInterface $userRegistrationService,
        UserLoginServiceInterface $userLoginService
    ) {
        // Assigning the injected services to class properties
        $this->userLoginService         = $userLoginService;
        $this->vaccineCenterService     = $vaccineCenterService;
        $this->userRegistrationService  = $userRegistrationService;
    }

    /**
     * Show the registration form with vaccine centers
     * 
     * @return \Illuminate\View\View
     */
    public function register()
    {
        // Fetch all vaccine centers from the service
        $centers = $this->vaccineCenterService->getAllCenters();

        // Pass the centers data to the registration view
        return view('register', ['centers' => $centers]);
    }

    /**
     * Handle the user registration process
     * 
     * @param UserRegistrationRequest $request - Validated registration request data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(UserRegistrationRequest $request)
    {
        // Attempt to register the user via the registration service
        $registrationSuccess = $this->userRegistrationService->registerUser($request);

        if ($registrationSuccess) {
            // Automatically log the user in after successful registration
            $isLoggedIn = $this->userLoginService->login($request);

            if ($isLoggedIn) {
                // Redirect to the profile page if login is successful
                return redirect()->to('user/profile')->with('success', 'User Registration success!!.');
            }

            // If automatic login fails, redirect to login page with success message
            return redirect()->to('login')->with('success', 'User Registration success!!. Please Login')->withInput();
        }

        // If registration fails, redirect back with error message
        return redirect()->back()->with('failed', 'Oops!! Something went wrong!!')->withInput();
    }
}
