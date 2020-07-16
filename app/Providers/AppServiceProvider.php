<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\BookingDetail\BookingDetailRepository;
use App\Repositories\BookingDetail\BookingDetailRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Room\RoomRepository;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Type\TypeRepository;
use App\Repositories\Type\TypeRepositoryInterface;
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
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->singleton(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->singleton(BookingDetailRepositoryInterface::class, BookingDetailRepository::class);
        $this->app->singleton(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->singleton(TypeRepositoryInterface::class, TypeRepository::class);
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
