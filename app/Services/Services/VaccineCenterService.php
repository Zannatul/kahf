<?php

namespace App\Services\Services;

use App\Services\ServiceInterfaces\VaccineCenterServiceInterface;
use App\Repositories\RepositoryInterfaces\VaccineCenterRepositoryInterface;

class VaccineCenterService implements VaccineCenterServiceInterface
{
    /**
     * @var VaccineCenterRepositoryInterface
     */
    protected $vaccineCenterRepository;

    /**
     * VaccineCenterService constructor.
     *
     * @param VaccineCenterRepositoryInterface $vaccineCenterRepository 
     */
    public function __construct(VaccineCenterRepositoryInterface $vaccineCenterRepository)
    {
        $this->vaccineCenterRepository = $vaccineCenterRepository;
    }

    /**
     * Retrieve all vaccine centers.
     *
     * @return mixed - Returns a collection of all vaccine centers
     */
    public function getAllCenters()
    {
        return $this->vaccineCenterRepository->all();
    }

    /**
     * Retrieve a specific vaccine center by its ID.
     *
     * @param int $id - The ID of the vaccine center to retrieve
     * @return mixed - Returns the vaccine center data if found, otherwise null
     */
    public function getCenterById($id)
    {
        return $this->vaccineCenterRepository->find($id);
    }
}
