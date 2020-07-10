<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class RoleTest extends TestCase
{
    protected $role;

    protected function setUp(): void
    {
        parent::setUp();
        $this->role = new Role();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->role);
    }

    public function test_table_name()
    {
        $this->assertEquals('roles', $this->role->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'role',
        ], $this->role->getFillable());
    }

    public function test_user_relation()
    {
        $this->test_hasMany_relation(
            User::class,
            'role_id',
            $this->role,
            'users'
        );
    }
}
