<?php

namespace App\Services\Services;

use Illuminate\Support\Facades\Auth;
use App\Services\ServiceInterfaces\UserServiceInterface;
use App\Repositories\RepositoryInterfaces\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepositoryInterface $userRepository - Repository for user operations
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        // Initialize the user repository
        $this->userRepository = $userRepository;
    }

    /**
     * Search for users based on provided search parameters
     *
     * @param Request $request - Incoming request containing search parameters
     * @return mixed - Returns the search results from the repository
     */
    public function search($request)
    {
        // Get search parameters from the request
        $searchParams = $request->get('search-params');
        // Delegate the search operation to the repository
        return $this->userRepository->search($searchParams);
    }

    /**
     * Retrieve the profile information of the authenticated user
     *
     * @return mixed - Returns the profile data of the user
     */
    public function getProfileInfomation()
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->id;
        // Fetch the profile information using the repository
        $userProfileData = $this->userRepository->fetchProfileInformation($userId);
        return $userProfileData;
    }

    /**
     * Update the schedule status for a specific user
     *
     * @param int $userId - The ID of the user
     * @param string $status - The new schedule status
     * @return bool - Returns true if the update was successful, otherwise false
     */
    public function updateScheduleStatus($userId, $status)
    {
        // Update the schedule status in the repository
        $updateStatus = $this->userRepository->updateScheduleStatus($userId, $status);
        return $updateStatus;
    }

    /**
     * Get a list of users scheduled for the next day
     *
     * @return array - An array of users with their scheduled information
     */
    public function getNextDayScheduledUser()
    {
        // Calculate the date for the next day
        $date = date('Y-m-d', strtotime(' +1 day'));
        // Fetch users scheduled for the next day
        $users = $this->userRepository->getNextDayScheduledUser($date);

        // Prepare an array to hold scheduled user information
        $scheduledUserArray = [];
        foreach ($users as $key => $user) {
            // Collect relevant data for each user
            $scheduledUserArray[$key]['email'] = $user->email;
            $scheduledUserArray[$key]['scheduled_date'] = $user->schedule->scheduled_date;
            $scheduledUserArray[$key]['scheduled_time'] = $user->schedule->scheduled_time;
            $scheduledUserArray[$key]['center'] = $user->vaccineCenter->name;
        }

        // Return the formatted array of scheduled users
        return $scheduledUserArray;
    }
}
