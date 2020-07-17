<?php

namespace App\Repositories\Room;

use Illuminate\Database\Eloquent\Collection;

interface RoomRepositoryInterface
{
    /**
     * filter room by type_id and eagerloading type
     * @param array $data
     * @param integer $type_id
     * @return Collection
     */
    public function getRoomByType($data = [], $type_id);
}
