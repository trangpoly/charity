<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getCategoryDetail($id);

    public function getListParentCategoryWithSub();

    public function searchCategory($nameCate, $statusCate);

    public function paginateCategory($amountItem);

    public function getProductsByCategory($id);

    public function getProductsByParentCategory();

    public function getProductsBySubCategory($id);

    public function getCategories($id);

    public function getParentCategories();

    public function getSubCategories($id);

    public function findParentCategory($parentCategoryId);
}
