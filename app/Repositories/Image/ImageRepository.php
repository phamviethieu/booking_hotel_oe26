<?php

namespace App\Repositories\Image;

use App\Models\Image;

class ImageRepository extends \App\Repositories\BaseRepository implements ImageRepositoryInterface
{
    public function getModel()
    {
        return Image::class;
    }
}
