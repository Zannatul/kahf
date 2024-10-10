<?php

namespace App\Services\Services;

use App\Repositories\RepositoryInterfaces\UserRegistrationRepositoryInterface;
use App\Services\ServiceInterfaces\UserRegistrationServiceInterface;

class UserRegistrationService implements UserRegistrationServiceInterface
{
    /**
     * @var UserRegistrationRepositoryInterface
     */
    protected $userRegistrationRepository;

    /**
     * UserRegistrationService constructor.
     *
     * @param UserRegistrationRepositoryInterface $userRegistrationRepository - Repository for user registration
     */
    public function __construct(UserRegistrationRepositoryInterface $userRegistrationRepository)
    {
        // Initialize the repository instance
        $this->userRegistrationRepository = $userRegistrationRepository;
    }

    /**
     * Register a new user with the provided user data
     *
     * @param array $userData - An associative array containing user information
     * @return bool - Returns true if registration was successful, otherwise false
     */
    public function registerUser($userData)
    {
        // Delegate the registration process to the repository
        return $this->userRegistrationRepository->registerUser($userData);
    }
}
