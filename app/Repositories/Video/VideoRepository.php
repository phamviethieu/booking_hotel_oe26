<?php

namespace App\Repositories\Video;

use App\Models\Video;
use App\Repositories\BaseRepository;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{
    public function getModel()
    {
        return Video::class;
    }
}
