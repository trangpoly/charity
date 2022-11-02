<?php

namespace App\Repositories\ProductImage;

use App\Repositories\BaseRepositoryInterface;

interface ProductImageRepositoryInterface extends BaseRepositoryInterface
{
    public function delImage($id);

    public function deleteMultiple($ids);
}
