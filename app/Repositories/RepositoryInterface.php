<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * Get all data of table
     * @return Collection|static[]
     */
    public function getAll();

    /**
     * Eagerload with parameter is array data and get data
     * @param  array $data
     * @return Collection|static[]
     */
    public function getWith($data = []);

    /**
     * Find by id
     * @param  array $data
     * @return bool
     */
    public function find($id);

    /**
     * Find by id and eagerload to get data
     * @param  integer $id
     * @return Collection|static[]
     */
    public function findWith($id, $attributes = []);

    /**
     * Create a record
     * @param  array $data
     * @return $this
     */
    public function create($data = []);

    /**
     * Update a record by id
     * @param  integer $id
     * @param  array $data
     * @return $bool
     */
    public function update($id, $data = []);

    /**
     * Delete a record by id
     * @param  integer $id
     * @return $bool
     */
    public function delete($id);
}
