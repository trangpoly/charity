<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function find($id);

    public function create($attribute);

    public function update($id, $attribute);
}
