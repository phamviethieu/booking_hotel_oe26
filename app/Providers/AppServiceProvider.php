<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Rating;
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
        $booking_waiting = Booking::where('status', config('status.booking_status.waiting'))->count();
        $booking_approved = Booking::where('status', config('status.booking_status.approved'))->count();
        $user_count = User::count();
        $rating_count = Rating::count();
        $types = Type::all();

        View::share([
            'booking_waiting' => $booking_waiting,
            'booking_approved' => $booking_approved,
            'booking_count' => $booking_count,
            'user_count' => $user_count,
            'types' => $types,
            'rating_count' => $rating_count,
        ]);
    }
}
