<?php


namespace App\Repositories\Rating;

use App\Models\Rating;

class RatingRepository extends \App\Repositories\BaseRepository implements RatingRepositoryInterface
{
    public function getModel()
    {
        return Rating::class;
    }
}
