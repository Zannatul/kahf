<?php

namespace App\Providers;

use App\Services\ServiceInterfaces\VaccineCenterServiceInterface;
use App\Services\Services\VaccineCenterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $this->app->bind(VaccineCenterServiceInterface::class, VaccineCenterService::class);

		$this->app->bind(
			\App\Services\ServiceInterfaces\UserRegistrationServiceInterface::class,
			\App\Services\Services\UserRegistrationService::class
		);

		$this->app->bind(
			\App\Services\ServiceInterfaces\UserServiceInterface::class,
			\App\Services\Services\UserService::class
		);

		$this->app->bind(
			\App\Services\ServiceInterfaces\UserLoginServiceInterface::class,
			\App\Services\Services\UserLoginService::class
		);

		$this->app->bind(
			\App\Services\ServiceInterfaces\VaccineSchedulingServiceInterface::class,
			\App\Services\Services\VaccineSchedulingService::class
		);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
