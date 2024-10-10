<?php

namespace App\Repositories\RepositoryInterfaces;

/**
 * Interface VaccineSchedulingRepositoryInterface
 *
 * This interface defines the contract for operations related to vaccine scheduling.
 */
interface VaccineSchedulingRepositoryInterface
{
    /**
     * Check for duplicate schedules for a user.
     *
     * @param int $userId The ID of the user to check for duplicate schedules.
     * @return mixed True if a duplicate schedule exists, false otherwise.
     */
    public function findDuplicateSchedule($userId);

    /**
     * Count the number of booked slots for a given vaccine center and date.
     *
     * @param int $vaccineCenterId The ID of the vaccine center.
     * @param string $scheduledDate The date for which to count booked slots (in 'Y-m-d' format).
     * @return int The count of booked slots.
     */
    public function countBookedSlot($vaccineCenterId, $scheduledDate);

    /**
     * Get the latest time slot booked for a specific date.
     *
     * @param string $date The date for which to get the latest time slot (in 'Y-m-d' format).
     * @return mixed The latest time slot, or null if none exists.
     */
    public function latestTimeSlot($date);

    /**
     * Store a new vaccine schedule.
     *
     * @param array $data The data to store for the new schedule.
     * @return mixed The result of the store operation.
     */
    public function storeSchedule($data);
}
