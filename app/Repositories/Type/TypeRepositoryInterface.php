<?php

namespace App\Repositories\Type;

use Illuminate\Database\Eloquent\Collection;

interface TypeRepositoryInterface
{
    /**
     * paginate
     * @param integer $perpage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perpage);

    /**
     * get comment recent of type
     * @param integer $type_id
     * @return Collection
     */
    public function getCommentRecent($type_id);
}
