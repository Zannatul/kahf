<?php

namespace App\Repositories\RepositoryInterfaces;

/**
 * Interface VaccineCenterRepositoryInterface
 *
 * This interface defines the contract for operations related to vaccine centers.
 */
interface VaccineCenterRepositoryInterface
{
    /**
     * Retrieve all vaccine centers.
     *
     * @return mixed A collection of all vaccine centers.
     */
    public function all();

    /**
     * Find a vaccine center by its ID.
     *
     * @param int $id The ID of the vaccine center to find.
     * @return mixed The vaccine center matching the specified ID, or null if not found.
     */
    public function find($id);
}
