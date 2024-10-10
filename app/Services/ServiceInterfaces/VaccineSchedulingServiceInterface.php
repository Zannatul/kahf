<?php

namespace App\Services\ServiceInterfaces;


interface VaccineSchedulingServiceInterface
{
    /**
     * Check if there is an available slot on the given date.
     * @param string $scheduledDate The date for which to check available slots (in 'Y-m-d' format).
     * @return bool True if there is an available slot, false if no slots are available.
     */
    public function checkAvailableSlot($scheduledDate);

    /**
     * Check for duplicate schedules for the current user.
     * @return bool True if a duplicate schedule exists, false if not.
     */
    public function checkDuplicateSchedule();

    /**
     * Store the vaccine schedule for the user.
     * @param \Illuminate\Http\Request $request The request object containing the schedule data.
     * @return bool True if the schedule was successfully stored, false otherwise.
     */
    public function storeSchedule($request);
}
