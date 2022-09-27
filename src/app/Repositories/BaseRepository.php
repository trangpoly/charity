<?php

namespace App\Repositories;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     */
    public $model;

    public function __construct(\App\Models\BaseModel $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    public function update($id, $attribute)
    {
        return $this->model->where($this->model->getKeyName(), $id)->update($attribute);
    }
}
