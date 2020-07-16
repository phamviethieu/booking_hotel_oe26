<?php

namespace App\Repositories\Type;

interface TypeRepositoryInterface
{
    /**
     * paginate
     * @param integer $perpage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perpage);
}
