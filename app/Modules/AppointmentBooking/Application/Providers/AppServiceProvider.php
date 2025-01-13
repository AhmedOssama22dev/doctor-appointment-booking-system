<?php

namespace App\Modules\AppointmentBooking\Application\Providers;

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
            'App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface',
            'App\Modules\AppointmentBooking\Infrastructure\Repositories\BookingRepository'
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
