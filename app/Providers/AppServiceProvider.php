<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\AppointmentBooking\Infrastructure\Repositories\BookingRepository;
use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;
use App\Modules\AppointmentManagement\Domain\Repository\AppointmentRepositoryInterface as AppointmentManagementRepositoryInterface;
use App\Modules\AppointmentManagement\Infrastructure\Presistence\AppointmentRepository as AppointmentManagementRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            BookingRepositoryInterface::class,
            BookingRepository::class
        );
        $this->app->bind(
            AppointmentManagementRepositoryInterface::class,
            AppointmentManagementRepository::class
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
