<?php

namespace App\Repositories\RepositoryInterfaces;

/**
 * Interface UserLoginRepositoryInterface
 *
 * This interface defines the contract for user login repository operations.
 * Implementations of this interface will handle the data access logic for user authentication.
 */
interface UserLoginRepositoryInterface
{
    // Define methods for user login operations, e.g.:

    /**
     * Attempt to find a user by their national ID and password.
     *
     * @param string $nationalId
     * @param string $password
     * @return User|null
     */
    // public function findByCredentials(string $nationalId, string $password);
}
