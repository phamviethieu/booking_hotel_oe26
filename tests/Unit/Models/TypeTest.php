<?php

namespace Tests\Unit\Models;

use App\Models\Image;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class TypeTest extends TestCase
{
    protected $type;

    protected function setUp(): void
    {
        parent::setUp();
        $this->type = new Type();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->type);
    }

    public function test_table_name()
    {
        $this->assertEquals('types', $this->type->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'name',
            'price',
            'max_people',
            'num_bed',
            'description',
        ], $this->type->getFillable());
    }

    public function test_image_relation()
    {
        $this->test_hasMany_relation(
            Image::class,
            'type_id',
            $this->type,
            'images'
        );
    }

    public function test_room_relation()
    {
        $this->test_hasMany_relation(
            Room::class,
            'type_id',
            $this->type,
            'rooms'
        );
    }
}
