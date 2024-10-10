<?php

namespace App\Repositories\Repositories;

use App\Models\User;
use Exception;
use App\Models\VaccineSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Services\ServiceInterfaces\UserServiceInterface;
use App\Repositories\RepositoryInterfaces\VaccineSchedulingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class VaccineSchedulingRepository implements VaccineSchedulingRepositoryInterface
{

    protected $model;
    protected $userService;

    /**
     * Constructor for initializing the VaccineSchedule model instance.
     * @param VaccineSchedule $model An instance of the VaccineSchedule model to be used.
     */
    public function __construct(VaccineSchedule $model, UserServiceInterface $userService)
    {
        $this->model        =   $model;
        $this->userService  =   $userService;
    }

    /**
     * Check if the user has a duplicate schedule.
     * @param int $userId The ID of the user to check for duplicate schedules.
     * @return bool True if a duplicate schedule exists, false if no schedule is found.
     */
    public function findDuplicateSchedule($userId)
    {
        // Count the total number of schedules for the user
        $totalScheduleByUser = $this->model->where('user_id', $userId)->get()->count();

        // If the user has at least one schedule, return true (duplicate found)
        if ($totalScheduleByUser > 0) {
            return true;
        }

        // If no schedule is found, return false (no duplicate)
        return false;
    }



    /**
     * Count the total number of booked slots for a specific vaccine center on a given date.
     * @param int 
     * @param string 
     * @return int 
     */
    public function countBookedSlot($vaccineCenterId, $scheduledDate)
    {
        $totalBookedSchedule = $this->model->where(['center_id' => $vaccineCenterId, 'scheduled_date' => $scheduledDate])->get()->count();
        return $totalBookedSchedule;
    }

    /**
     * Retrieve the latest booked time slot for a given date.
     * @param string 
     * @return mixed 
     */
    public function latestTimeSlot($date)
    {
        $lastBookedSlot = $this->model->where('scheduled_date', $date)->orderBy('scheduled_time', 'desc')->first();
        return $lastBookedSlot;
    }

    /**
     * Store a new vaccine schedule in the database.
     * @param array 
     * @return bool 
     */
    public function storeSchedule($data)
    {
        $userId = $data['user_id'];
        $status = User::SCHEDULED;
        try {
            DB::beginTransaction();
            $this->model->create($data);
            $this->userService->updateScheduleStatus($userId, $status);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
