<?php

namespace App\Services\ServiceInterfaces;

interface VaccineCenterServiceInterface
{
    /**
     * Retrieve all available vaccine centers
     *
     * @return array - An array of vaccine center data
     */
    public function getAllCenters();

    /**
     * Get details of a specific vaccine center by its ID
     *
     * @param int $id - The ID of the vaccine center
     * @return mixed - Returns the details of the vaccine center or null if not found
     */
    public function getCenterById($id);
}
