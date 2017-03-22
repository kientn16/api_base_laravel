<?php

namespace App\Repositories\Eloquents;

class DbRepository {

    /**
    * Eloquent model
    */
    protected $model;

    /**
    * @param $model
    */
    function __construct($model)
    {
        $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function pluck($column, $key = null, $sortColumn = null, $direction = 'asc') {
        return $this->model->orderBy($sortColumn, $direction)->pluck($column, $key);
    }

    public function findById($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $obj = $this->model->findOrFail($id);
        return $obj->update($data);
    }

    public function destroy($id)
    {
        $obj = $this->model->findOrFail($id);
        return $obj->delete();
    }

    public function findBy($key, $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
