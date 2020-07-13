<?php

namespace Tests\Unit\Models;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->user);
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'username',
            'password',
            'name',
            'avatar',
            'email',
            'address',
            'phone_number',
            'role_id',
        ], $this->user->getFillable());
    }

    public function test_hidden()
    {
        $this->assertEquals([
            'password',
            'remember_token'
        ], $this->user->getHidden()
        );
    }

    public function test_role_relation()
    {
        $this->test_belongsTo_relation(
            Role::class,
            'role_id',
            'id',
            $this->user,
            'role'
        );
    }

    public function test_rate_relation()
    {
        $this->test_hasMany_relation(
            Rating::class,
            'user_id',
            $this->user,
            'ratings'
        );
    }

    public function test_booking_relation()
    {
        $this->test_hasMany_relation(
            Booking::class,
            'user_id',
            $this->user,
            'bookings'
        );
    }

    public function test_comment_relation()
    {
        $this->test_hasMany_relation(
            Comment::class,
            'user_id',
            $this->user,
            'comments'
        );
    }
}
