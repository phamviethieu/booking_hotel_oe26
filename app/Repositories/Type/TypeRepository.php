<?php

namespace App\Repositories\Type;

use App\Models\Type;
use App\Repositories\BaseRepository;

class TypeRepository extends BaseRepository implements TypeRepositoryInterface
{
    public function getModel()
    {
        return Type::class;
    }

    public function paginate($perpage)
    {
        return $this->model->paginate($perpage);
    }

}
