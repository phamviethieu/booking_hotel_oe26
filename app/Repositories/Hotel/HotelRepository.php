<?php

namespace App\Repositories\Hotel;

use App\Models\Hotel;
use App\Repositories\BaseRepository;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{
    public function getModel()
    {
        return Hotel::class;
    }
}
