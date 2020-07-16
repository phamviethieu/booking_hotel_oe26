<?php

namespace App\Repositories\BookingDetail;

use App\Models\BookingDetail;
use App\Repositories\BaseRepository;

class BookingDetailRepository extends BaseRepository implements BookingDetailRepositoryInterface
{
    public function getModel()
    {
        return BookingDetail::class;
    }
}
