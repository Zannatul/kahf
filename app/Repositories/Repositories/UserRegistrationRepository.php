<?php

namespace App\Repositories\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\RepositoryInterfaces\UserRegistrationRepositoryInterface;

/**
 * Class UserRegistrationRepository
 *
 * This class implements the UserRegistrationRepositoryInterface and handles user registration.
 */
class UserRegistrationRepository implements UserRegistrationRepositoryInterface
{
    protected $model;

    /**
     * UserRegistrationRepository constructor.
     *
     * @param User $user The User model instance.
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Register a new user.
     *
     * @param mixed $userData The data for the new user (usually from a request).
     * @return bool True if the registration was successful, false otherwise.
     */
    public function registerUser($userData)
    {
        // Generate a random registration number
        $regNo = random_int(1000000, 9999999);

        try {
            // Start a database transaction
            DB::beginTransaction();
            // Create a new user with hashed password and registration number
            $this->model->create(
                $userData->except('_token') + [
                    'registration_no' => $regNo,
                    'password' => bcrypt($userData->password)
                ]
            );
            // Commit the transaction
            DB::commit();
            return true; // Registration successful
        } catch (Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            return false; // Registration failed
        }
    }
}
