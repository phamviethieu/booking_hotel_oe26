<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getWith($attributes = [])
    {
        return $this->model
            ->with($attributes)
            ->get();
    }

    public function getWithAndPaginate($data, $perPage)
    {
        return $this->model->with($data)->paginate($perPage);
    }

    public function find($id)
    {
        try {
            $result = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return false;
        }

        return $result;
    }

    public function findWith($id, $attributes = [])
    {
        try {
            $result = $this->model->with($attributes)->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return false;
        }

        return $result;
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function update($id, $data = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($data);

            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
