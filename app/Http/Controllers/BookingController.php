<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function booking()
    {
        $types = Type::paginate(config('paginate.per_page'));

        return view('functions.booking_select_room', [
            'types' => $types,
        ]);
    }


    public function price($room_number, $hours, $price)
    {
        return $room_number * $hours * $price;
    }

    public function checkRoomAvailable($room_id, $checkin, $checkout)
    {

        $checkin = date('Y-m-d H:i:s', strtotime($checkin));
        $checkout = date('Y-m-d H:i:s', strtotime($checkout));

        if ($checkout > $checkin) {
            $result = DB::table('bookings')
                ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
                ->where([
                    ['booking_details.room_id', '=', $room_id],
                    ['bookings.checkin', '<=', $checkin],
                    ['bookings.checkout', '>=', $checkout],
                ])
                ->orWhere([
                    ['booking_details.room_id', '=', $room_id],
                    ['bookings.checkin', '>=', $checkin],
                    ['bookings.checkin', '<=', $checkout],
                ])
                ->orWhere([
                    ['booking_details.room_id', '=', $room_id],
                    ['bookings.checkout', '>=', $checkin],
                    ['bookings.checkout', '<=', $checkout],
                ])
                ->get();

            if (!$result->count()) {
                return true;
            } else {
                return $result;
            };
        }
        return false;
    }

    public function selectRoomAvailable(Request $request)
    {

        $user = Auth::user();
        $type = Type::with('rooms')->findOrFail($request->type_id);

        $num_rooms = $request->number_of_rooms;
        $checkin = new Carbon($request->time_check_in);
        $checkout = new Carbon($request->time_check_out);
        $hours = $checkout->diffInHours($checkin);
        $price = $type->price;
        $total = self::price($num_rooms, $hours, $price);

        if ($checkin > Carbon::now() && $checkin < $checkout) {
            if ($hours <= 1) {
                Session::flash('message', trans('message.alert.time_not_enough'));
                Session::flash('icon', 'error');

                return redirect()->route('booking');
            } else {
                foreach ($type->rooms as $room) {
                    if ($room->status == config('status.room_status.ready')) {
                        $check = self::checkRoomAvailable(
                            $room->id,
                            $request->time_check_in,
                            $request->time_check_out
                        );
                        if ($check === true) {
                            $booking_room_id[] = $room->id;
                        }
                    }
                }

                if (isset($booking_room_id) && count($booking_room_id) > 0) {
                    if (count($booking_room_id) < $num_rooms) {
                        Session::flash('message', trans('message.booking.not_enough_room'));
                        Session::flash('icon', 'error');

                        return redirect()->route('booking');
                    } else {
                        $data['user_id'] = Auth::id();
                        $data['checkin'] = $checkin;
                        $data['checkout'] = $checkout;
                        $data['adult'] = (int)$request->adults;
                        $data['child'] = (int)$request->children;
                        $data['status'] = 0;
                        $data['deposit'] = 0;
                        $data['price'] = $total;

                        $booking = Booking::create($data);
                        foreach ($booking_room_id as $key => $room_id) {
                            $booking_detail['booking_id'] = $booking->id;
                            $booking_detail['room_id'] = $room_id;
                            $room_name[] = Room::find($room_id)->name;
                            BookingDetail::create($booking_detail);
                            if ($num_rooms == $key + 1) {
                                break;
                            }
                        }
                        return view('functions.booking_info', compact(
                            'booking',
                            'room_name',
                            'total',
                            'type',
                            'user'
                        ));
                    }
                } else {
                    Session::flash('message', trans('message.booking.not_enough_room'));
                    Session::flash('icon', 'error');

                    return redirect()->route('booking');
                }
            }
        } else {
            Session::flash('message', trans('message.alert.illegal'));
            Session::flash('icon', 'error');

            return redirect()->route('booking');
        }
    }
}
