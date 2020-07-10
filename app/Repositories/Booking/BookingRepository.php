<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Repositories\BaseRepository;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    function getModel()
    {
        return Booking::class;
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
}
