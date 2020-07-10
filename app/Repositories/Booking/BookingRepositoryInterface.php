<?php

namespace App\Repositories\Booking;

interface BookingRepositoryInterface
{
    public function updateStatus($id, $status);
}
