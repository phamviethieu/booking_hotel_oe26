<?php

namespace App\Repositories\Room;

use App\Models\Room;
use App\Repositories\BaseRepository;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    public function getModel()
    {
        return Room::class;
    }

    public function getRoomByType($data = [], $type_id)
    {
        return $this->model
            ->with('type')
            ->ofType($type_id)
            ->get();
    }
}
