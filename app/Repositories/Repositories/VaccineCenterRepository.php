<?php

namespace App\Repositories\Repositories;

use App\Models\VaccineCenter;
use App\Repositories\RepositoryInterfaces\VaccineCenterRepositoryInterface;

/**
 * Class VaccineCenterRepository
 *
 * This class implements the VaccineCenterRepositoryInterface and handles operations related to vaccine centers.
 */
class VaccineCenterRepository implements VaccineCenterRepositoryInterface
{
    protected $model;

    /**
     * VaccineCenterRepository constructor.
     *
     * @param VaccineCenter $model The VaccineCenter model instance.
     */
    public function __construct(VaccineCenter $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all vaccine centers ordered by name.
     *
     * @return \Illuminate\Support\Collection A collection of vaccine center names indexed by their IDs.
     */
    public function all()
    {
        // Fetch all vaccine centers, ordered by name in ascending order
        return $this->model->orderBy('name', 'asc')->get()->pluck('name', 'id');
    }

    /**
     * Find a vaccine center by its ID.
     *
     * @param int $id The ID of the vaccine center to find.
     * @return VaccineCenter The found vaccine center instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the vaccine center is not found.
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
