<?php

namespace App\Repositories\Banner;

use App\Models\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    public function model()
    {
        return Banner::class;
    }

    public function findIndex($key)
    {
        return $this->model->where('index_position', $key)->first();
    }
}
