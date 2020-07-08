<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Type;
use App\Models\User;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
        $this->app->singleton(
            BookingRepositoryInterface::class,
            BookingRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $booking_count = Booking::count();
        $user_count = User::count();
        $types = Type::all();
        $hotels = Hotel::all();

        View::share([
            'booking_count' => $booking_count,
            'user_count' => $user_count,
            'types' => $types,
            'hotels' => $hotels,
        ]);
    }
}
