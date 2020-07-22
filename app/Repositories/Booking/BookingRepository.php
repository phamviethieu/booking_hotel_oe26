<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    public function getModel()
    {
        return Booking::class;
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
            }
            return $result;
        }
        return false;
    }

    public function updateStatus($id, $status)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update(['status' => $status]);

            return true;
        }

        return false;
    }

    public function updateDeposit($id, $deposit)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update(['deposit' => $deposit]);

            return true;
        }

        return false;
    }

    public function countByStatus($status)
    {
        return $this->model
            ->where('status', $status)
            ->count();
    }

    public function countByStatusThisWeek($status)
    {
        $now = now();
        $startOfWeek = now()->startOfWeek();

        return $this->model
            ->where('status', $status)
            ->whereBetween('created_at', [$startOfWeek, $now])
            ->count();
    }

    public function getWithOrderBy($attributes = [], $column, $key)
    {
        return $this->model
            ->with($attributes)
            ->orderBy($column, $key)
            ->get();
    }
}

