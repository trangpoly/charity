<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductDetail($id);

    public function getRecommend($currentProductId, $categoryId);

    public function getNearExpiryFood();
}
