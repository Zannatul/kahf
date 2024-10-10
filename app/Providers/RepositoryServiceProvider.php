<?php

namespace App\Providers;

use App\Repositories\Repositories\VaccineCenterRepository;
use App\Repositories\RepositoryInterfaces\VaccineCenterRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VaccineCenterRepositoryInterface::class, VaccineCenterRepository::class);

		$this->app->bind(
			\App\Repositories\RepositoryInterfaces\UserRegistrationRepositoryInterface::class,
			\App\Repositories\Repositories\UserRegistrationRepository::class
		);

		$this->app->bind(
			\App\Repositories\RepositoryInterfaces\UserRepositoryInterface::class,
			\App\Repositories\Repositories\UserRepository::class
		);

		$this->app->bind(
			\App\Repositories\RepositoryInterfaces\UserLoginRepositoryInterface::class,
			\App\Repositories\Repositories\UserLoginRepository::class
		);

		$this->app->bind(
			\App\Repositories\RepositoryInterfaces\VaccineSchedulingRepositoryInterface::class,
			\App\Repositories\Repositories\VaccineSchedulingRepository::class
		);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
