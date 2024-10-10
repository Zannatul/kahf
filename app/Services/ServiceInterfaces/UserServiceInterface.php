<?php

namespace App\Services\ServiceInterfaces;

interface UserServiceInterface
{
    /**
     * Search for users based on the provided criteria
     *
     * @param \Illuminate\Http\Request $request - The request object containing search parameters
     * @return array - An array of users matching the search criteria
     */
    public function search($request);

    /**
     * Retrieve the profile information of the currently authenticated user
     *
     * @return mixed - Returns the user's profile data
     */
    public function getProfileInfomation();

    /**
     * Update the vaccination schedule status of a user
     *
     * @param int $userId - The ID of the user whose schedule status will be updated
     * @param string $status - The new vaccination status to be set
     * @return bool - Returns true if the status update is successful, otherwise false
     */
    public function updateScheduleStatus($userId, $status);

    /**
     * Get a list of users scheduled for vaccination the next day
     *
     * @return array - An array of users scheduled for vaccination
     */
    public function getNextDayScheduledUser();
}
