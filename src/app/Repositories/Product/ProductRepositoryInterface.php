<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductDetail($id);

    public function getProductsBySubCategory($id);

    public function getRecommend($currentProductId, $categoryId);

    public function getNearExpiryFood($currentProductId);

    public function getUserPosts($userId);

    public function findPostWithImages($id);
}
