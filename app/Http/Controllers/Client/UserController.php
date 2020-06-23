<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $booking = $user->bookings()
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('functions.user_detail', compact('user', 'booking'));
        } else {
            return view('errors.404');
        }
    }

    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $booking = $user->bookings()
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('functions.user_edit', compact('user', 'booking'));
        } else {
            return view('errors.404');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('show');
    }
}
