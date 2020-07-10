<?php

namespace Tests\Unit\Models;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Role;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class RoomTest extends TestCase
{
    protected $room;

    protected function setUp(): void
    {
        parent::setUp();
        $this->room = new Room();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->room);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_table_name()
    {
        $this->assertEquals('rooms', $this->room->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'name',
            'hotel_id',
            'type_id',
            'description',
            'status',
        ], $this->room->getFillable());
    }

    public function test_type_relation()
    {
        $this->test_belongsTo_relation(
            Type::class,
            'type_id',
            'id', $this->room,
            'type'
        );
    }

    public function test_image_relation()
    {
        $this->test_hasMany_relation(
            Image::class,
            'room_id',
            $this->room,
            'images'
        );
    }

    public function test_comment_relation()
    {
        $this->test_hasMany_relation(
            Comment::class,
            'room_id',
            $this->room,
            'comments'
        );
    }

    public function test_booking_relation()
    {
        $this->test_belongsToMany_relation(
            Booking::class,
            'room_id',
            'booking_id',
            $this->room,
            'bookings'
        );
    }
}
