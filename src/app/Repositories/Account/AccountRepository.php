<?php

namespace App\Repositories\Account;

use App\Models\Admin;
use App\Repositories\BaseRepository;

class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    public function model()
    {
        return Admin::class;
    }

    public function list()
    {
        return $this->model->get();
    }
}
