<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductDetail($id);

    public function getProductsBySubCategory($id);

    public function getSubCategory();

    public function list();

    public function search($request);

    public function filter($sortExpireDate, $id);

    public function filterSearch($sortExpireDate, $subCate);

    public function filterSearchAll($sortExpireDate, $id);

    public function delete($id);

    public function getRecommend($currentProductId, $categoryId);

    public function getNearExpiryFood($currentProductId);

    public function findProductsRegistered();

    public function findPostWithImages($id);

    public function findProductsNotRegistered();

    public function findProductsMarkedSoldOut();

    public function findProductsGived($userId);

    public function searchProductByName($data);
}
