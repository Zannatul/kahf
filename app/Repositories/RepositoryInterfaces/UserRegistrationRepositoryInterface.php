<?php

namespace App\Repositories\RepositoryInterfaces;

/**
 * Interface UserRegistrationRepositoryInterface
 *
 * This interface defines the contract for user registration repository operations.
 */
interface UserRegistrationRepositoryInterface
{
    /**
     * Register a new user in the system.
     *
     * @param array $userData The user data to register.
     * @return bool True if registration was successful, false otherwise.
     */
    public function registerUser($userData);
}
