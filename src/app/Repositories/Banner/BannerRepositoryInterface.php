<?php

namespace App\Repositories\Banner;

use App\Repositories\BaseRepositoryInterface;

interface BannerRepositoryInterface extends BaseRepositoryInterface
{
    public function findIndex($key);
}
