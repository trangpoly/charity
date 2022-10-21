<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function all()
    {
        return $this->model::withTrashed()->get();
    }

    public function find($id)
    {
        return $this->model::withTrashed()->find($id);
    }

    public function restore($id)
    {
        return $this->model::withTrashed()->where('id', $id)->restore();
    }
}
