<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::orderBy('created_at', 'DESC')->get();

        return view('admin.bookings.list', compact('booking'));
    }

    public function showAllRoom()
    {

        $room = Room::all();

        return view('booking_detail', [
            'room' => $room,
        ]);
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
            Session::flash('deleted', trans('message.deleted'));
            Session::flash('icon', trans('success'));

            return redirect()->route('bookings.index');

        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    public function updateStatus(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->status = $request->status ?? $booking->status;
        if ($request->deposit) {
            $booking->deposit = $request->deposit;
        }
        $booking->save();
        $approve_booking_count = $booking->where('status', config('status.booking_status.approved'))->count();
        $unapprove_booking_count = $booking->where('status', config('status.booking_status.waiting'))->count();

        return response()->json([
            'approve_booking_count' => $approve_booking_count,
            'unapprove_booking_count' => $unapprove_booking_count,
        ]);
    }

    public function showDetails($id)
    {
        $booking = Booking::find($id);
        $booking->user_name = $booking->user->name;
        $booking->phone_number = $booking->user->phone_number;
        $booking->email = $booking->user->email;

        return json_encode($booking);
    }
}
