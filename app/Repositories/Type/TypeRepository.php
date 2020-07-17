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

    public function getCommentRecent($type_id)
    {
        return $this->model->find($type_id)->comments()
            ->latest('created_at')
            ->first();
    }
}
