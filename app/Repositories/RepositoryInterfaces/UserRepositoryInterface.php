<?php

namespace App\Repositories\RepositoryInterfaces;

/**
 * Interface UserRepositoryInterface
 *
 * This interface defines the contract for user repository operations.
 */
interface UserRepositoryInterface
{
    /**
     * Search for users based on provided parameters.
     *
     * @param array $searchParams The parameters to use for searching.
     * @return mixed A collection of users that match the search criteria.
     */
    public function search($searchParams);

    /**
     * Fetch profile information for a specific user.
     *
     * @param int $userId The ID of the user whose profile information is to be fetched.
     * @return mixed The user's profile information.
     */
    public function fetchProfileInformation($userId);

    /**
     * Update the scheduling status of a user.
     *
     * @param int $userId The ID of the user whose schedule status is to be updated.
     * @param string $status The new status to set for the user's schedule.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateScheduleStatus($userId, $status);

    /**
     * Retrieve users who are scheduled for the next day.
     *
     * @param string $date The date for which to fetch the scheduled users.
     * @return mixed A collection of users scheduled for the specified date.
     */
    public function getNextDayScheduledUser($date);
}
