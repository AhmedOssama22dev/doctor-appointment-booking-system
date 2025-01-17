<?php

namespace App\Providers;

use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;
use App\Modules\AppointmentBooking\Infrastructure\Repositories\BookingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // bind the BookingRepositoryInterface to the BookingRepository
        $this->app->bind(
            BookingRepositoryInterface::class,
            BookingRepository::class
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
