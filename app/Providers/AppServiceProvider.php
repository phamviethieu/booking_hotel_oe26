<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Type;
use App\Models\User;
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
        //
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
