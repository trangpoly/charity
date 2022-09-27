<?php

interface BaseRepositoryInterface
{
    public function find($id);

    public function create($attribute);

    public function update($id, $attribute);
}
