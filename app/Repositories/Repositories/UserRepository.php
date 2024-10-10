<?php

namespace App\Repositories\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\RepositoryInterfaces\UserRepositoryInterface;

/**
 * Class UserRepository
 *
 * This class implements the UserRepositoryInterface and handles user-related operations.
 */
class UserRepository implements UserRepositoryInterface
{
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param User $user The User model instance.
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Search for a user by their national ID.
     *
     * @param string $searchParam The national ID of the user to search for.
     * @return User|null The found user instance or null if not found.
     */
    public function search($searchParam)
    {
        // Search for the user by national ID and eager load related vaccine center and schedule
        $users = $this->model->where(['national_id' => $searchParam])
            ->with('vaccineCenter', 'schedule')->first();
        return $users;
    }

    /**
     * Fetch the profile information for a user by their ID.
     *
     * @param int $userId The ID of the user to fetch.
     * @return User|null The user's profile data or null if not found.
     */
    public function fetchProfileInformation($userId)
    {
        // Retrieve the user's profile data with related vaccine center and schedule
        $userProfileData = $this->model->with('vaccineCenter', 'schedule')->find($userId);
        return $userProfileData;
    }

    /**
     * Update the user's vaccination status.
     *
     * @param int $userId The ID of the user to update.
     * @param int $status The new vaccination status to set for the user.
     * @return bool True if the update is successful, false otherwise.
     */
    public function updateScheduleStatus($userId, $status)
    {
        // Find the user by ID
        $user = $this->model->find($userId);
        if (!$user) {
            return false;
        }
        try {
            DB::beginTransaction();
            $user->vaccination_status = $status;
            $user->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Get users scheduled for the next day based on the provided date.
     *
     * @param string $date The date to check for scheduled users.
     * @return \Illuminate\Database\Eloquent\Collection The collection of users scheduled for the next day.
     */
    public function getNextDayScheduledUser($date)
    {
        // Retrieve users with a schedule matching the given date, eager loading related vaccine center and schedule
        $users = $this->model->with('vaccineCenter', 'schedule')
            ->whereHas('schedule', function ($query) use ($date) {
                $query->where('scheduled_date', $date);
            })->get();
        return $users;
    }
}
