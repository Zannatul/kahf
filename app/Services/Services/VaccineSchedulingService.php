<?php

namespace App\Services\Services;

use Illuminate\Support\Facades\Auth;
use App\Services\ServiceInterfaces\VaccineCenterServiceInterface;
use App\Services\ServiceInterfaces\VaccineSchedulingServiceInterface;
use App\Repositories\RepositoryInterfaces\VaccineSchedulingRepositoryInterface;

class VaccineSchedulingService implements VaccineSchedulingServiceInterface
{
    /**
     * @var VaccineCenterServiceInterface
     */
    protected $vaccineCenterService;

    /**
     * @var VaccineSchedulingRepositoryInterface
     */
    protected $vaccineSchedulingRepository;

    /**
     * VaccineSchedulingService constructor.
     *
     * @param VaccineSchedulingRepositoryInterface $vaccineSchedulingRepository - Repository for vaccine scheduling operations
     * @param VaccineCenterServiceInterface $vaccineCenterService - Service for vaccine center operations
     */
    public function __construct(VaccineSchedulingRepositoryInterface $vaccineSchedulingRepository, VaccineCenterServiceInterface $vaccineCenterService)
    {
        // Initialize the vaccine center service and scheduling repository
        $this->vaccineCenterService         =   $vaccineCenterService;
        $this->vaccineSchedulingRepository  =   $vaccineSchedulingRepository;
    }

    /**
     * Check if a vaccine center has available slots on a given date.
     *
     * @param string $scheduledDate The date for which to check availability (in 'Y-m-d' format).
     * @return bool True if there are available slots, false if the center is fully booked.
     */
    public function checkAvailableSlot($scheduledDate)
    {
        // Get the ID of the currently authenticated user's vaccine center
        $vaccineCenterId = Auth::user()->center_id;

        // Format the scheduled date to 'Y-m-d'
        $scheduledDate = date('Y-m-d', strtotime($scheduledDate));

        // Retrieve details of the vaccine center
        $centerDetails = $this->vaccineCenterService->getCenterById($vaccineCenterId);

        // Get the total capacity of the vaccine center
        $totalCapacity = $centerDetails->capacity;

        // Count how many slots have been booked for the given date
        $bookedSlot = $this->vaccineSchedulingRepository->countBookedSlot($vaccineCenterId, $scheduledDate);

        // Check if there are available slots
        return $bookedSlot < $totalCapacity;
    }

    /**
     * Check for duplicate schedules for the authenticated user.
     *
     * @return bool True if duplicate schedule exists, false otherwise.
     */
    public function checkDuplicateSchedule()
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->id;

        // Check for duplicate schedule in the repository
        return $this->vaccineSchedulingRepository->findDuplicateSchedule($userId);
    }

    /**
     * Store a new vaccine schedule based on the request data.
     *
     * @param Request $request The request containing the schedule data.
     * @return bool True if the schedule is stored successfully, false otherwise.
     */
    public function storeSchedule($request)
    {
        // Format the scheduled date to 'Y-m-d'
        $scheduledDate = date('Y-m-d', strtotime($request->scheduled_date));

        // Prepare the data for storage
        $data['user_id']        = Auth::user()->id;
        $data['center_id']      = Auth::user()->center_id;
        $data['vaccine_name']   = $request->vaccine_name;
        $data['scheduled_date'] = $scheduledDate;
        $data['scheduled_time'] = $this->getNextTimeSlot($scheduledDate);

        // Store the schedule in the repository
        return $this->vaccineSchedulingRepository->storeSchedule($data);
    }

    /**
     * Get the next available time slot for a given scheduled date.
     *
     * @param string $scheduledDate The date for which to find the next time slot.
     * @return string The next available time slot in 'H:i' format.
     */
    protected function getNextTimeSlot($scheduledDate)
    {
        // Set the default time to 9:00 AM if no slots are found
        $defaultTime = '09:00';

        // Query the latest time slot booked for the given date
        $lastBookedSlot = $this->vaccineSchedulingRepository->latestTimeSlot($scheduledDate);

        // If no time slot exists for the date, return the default time
        if (!$lastBookedSlot) {
            return $defaultTime;
        }

        // Get the latest time slot booked and add 5 minutes
        $lastTime = $lastBookedSlot->scheduled_time;
        $nextTime = date('H:i', strtotime($lastTime . ' + 5 minutes'));

        return $nextTime;
    }
}
