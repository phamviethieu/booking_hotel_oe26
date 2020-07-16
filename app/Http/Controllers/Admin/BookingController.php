<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    protected $bookingRepo;
    protected $roomRepo;

    public function __construct(
        BookingRepositoryInterface $bookingRepo,
        RoomRepositoryInterface $roomRepo
    ) {
        $this->bookingRepo = $bookingRepo;
        $this->roomRepo = $roomRepo;
    }

    public function index()
    {
        $booking = $this->bookingRepo
            ->getWithOrderBy(
                ['rooms', 'user'],
                'created_at',
                'DESC'
            );

        return view('admin.bookings.list',
            compact('booking'));
    }

    public function showAllRoom()
    {
        $room = $this->roomRepo->getAll();

        return view('booking_detail', [
            'room' => $room,
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->bookingRepo->delete($id);
            Session::flash('deleted', trans('message.deleted'));
            Session::flash('icon', trans('success'));

            return redirect()->route('bookings.index');
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $booking = $this->bookingRepo->find($id);
        $status = $request->status ?? $booking->status;
        if ($request->deposit) {
            $deposit = $request->deposit;
            $this->bookingRepo->updateDeposit($id, $deposit);
        }
        $this->bookingRepo->updateStatus($id, $status);
        $approve_booking_count = $this->bookingRepo
            ->countByStatus(config('status.booking_status.approved'));
        $unapprove_booking_count = $this->bookingRepo
            ->countByStatus(config('status.booking_status.waiting'));

        return response()->json([
            'approve_booking_count' => $approve_booking_count,
            'unapprove_booking_count' => $unapprove_booking_count,
        ]);
    }

    public function showDetails($id)
    {
        $booking = $this->bookingRepo->find($id);
        $booking->user_name = $booking->user->name;
        $booking->phone_number = $booking->user->phone_number;
        $booking->email = $booking->user->email;

        return json_encode($booking);
    }
}
