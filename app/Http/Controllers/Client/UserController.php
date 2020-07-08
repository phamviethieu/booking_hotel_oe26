<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userRepo;
    protected $bookingRepo;
    private $status;

    public function __construct(
        UserRepositoryInterface $userRepo,
        BookingRepositoryInterface $bookingRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->bookingRepo = $bookingRepo;
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $bookings = $user->bookings()
                ->orderBy('created_at', 'DESC')
                ->paginate(config('paginate.paginations'));

            return view('functions.user_detail', compact('user', 'bookings'));
        } else {
            return redirect()->route('login');
        }
    }

    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $bookings = $user->bookings()
                ->orderBy('created_at', 'DESC')
                ->paginate(config('paginate.paginations'));

            return view('functions.user_edit', compact('user', 'bookings'));
        } else {
            return redirect()->route('login');
        }
    }

    public function update(UserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $image = Str::random(2) . "_" . $name;
            while (file_exists(config('contacts_hotel.url_avatar_default') . $image)) {
                $image = Str::random(2) . "_" . $name;
            }
            $file->move(config('contacts_hotel.url_avatar_default'), $image);
        }
        if (isset($image)) {
            $image = $image;
        } else {
            $image = NULL;
        }

        $this->userRepo->update(Auth::id(), [
            'avatar' => $image,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        Session::flash('message', trans('message.alert.profileUpdated'));
        Session::flash('icon', 'success');

        return redirect()->route('user.index');
    }

    public function cancelBooking(Request $request)
    {
        $id = $request->id;
        $this->status = config('status.booking_status.canceled');
        $this->bookingRepo->updateStatus($id, $this->status);
        Session::flash('message', trans('message.deleteSuccess'));
        Session::flash('icon', 'success');

        return redirect()->route('user.index');
    }
}
