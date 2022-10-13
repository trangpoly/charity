<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function find($id);

    public function create($attribute);

    public function update($id, $attribute);

    public function paginate();

    public function delete($id);

}
