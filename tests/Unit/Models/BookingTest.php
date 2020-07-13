<?php

namespace Tests\Unit\Models;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Tests\TestCase;

class BookingTest extends TestCase
{
    protected $booking;

    protected function setUp(): void
    {
        parent::setUp();
        $this->booking = new Booking();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->booking);
    }

    public function test_table_name()
    {
        $this->assertEquals('bookings', $this->booking->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'user_id',
            'status',
            'checkin',
            'checkout',
            'adult',
            'child',
            'deposit',
            'price',
        ], $this->booking->getFillable());
    }

    public function test_user_relation()
    {
        $this->test_belongsTo_relation(
            User::class,
            'user_id',
            'id',
            $this->booking,
            'user'
        );
    }

    public function test_room_relation()
    {
        $this->test_belongsToMany_relation(
            Room::class,
            'booking_id',
            'room_id',
            $this->booking,
            'rooms'
        );
    }
}
