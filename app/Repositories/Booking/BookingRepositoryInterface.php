<?php

namespace App\Repositories\Booking;

use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    /**
     * Update column status in booking table
     * @param  integer $id
     * @param integer $status
     * @return bool
     */
    public function updateStatus($id, $status);

    /**
     * Update column deposit in bookings table
     * @param  integer $id
     * @param integer $deposit
     * @return bool
     */
    public function updateDeposit($id, $deposit);

    /**
     * count booking by status condition
     * @param  integer $status
     * @return interger
     */
    public function countByStatus($status);

    /**
     * Eagerload and order booking by key
     * @param  array $attributes
     * @param string $column
     * @param string $key
     * @return Collection|static[]
     */
    public function getWithOrderBy($attributes = [], $column, $key);

    /**
     * Check a room if available
     * @param  integer $room_id
     * @param string $checkin
     * @param string $checkout
     * @return boolean
     */
    public function checkRoomAvailable($room_id, $checkin, $checkout);
}
