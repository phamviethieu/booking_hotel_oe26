<?php

namespace Tests;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function test_hasMany_relation($related, $foreignKey, $model, $relationName)
    {
        $relation = $model->$relationName();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf($related, $relation->getRelated());
        $this->assertEquals($foreignKey, $relation->getForeignKeyName());
    }

    protected function test_belongsTo_relation($related, $foreignKey, $ownerKey, $model, $relationName)
    {
        $relation = $model->$relationName();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf($related, $relation->getRelated());
        $this->assertEquals($ownerKey, $relation->getOwnerKeyName());
        $this->assertEquals($foreignKey, $relation->getForeignKeyName());
    }

    protected function test_belongsToMany_relation($related, $foreignKey, $relatedKey, $model, $relationName)
    {
        $relation = $model->$relationName();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf($related, $relation->getRelated());
        $this->assertEquals($relatedKey, $relation->getRelatedPivotKeyName());
        $this->assertEquals($foreignKey, $relation->getForeignPivotKeyName());
    }
}
