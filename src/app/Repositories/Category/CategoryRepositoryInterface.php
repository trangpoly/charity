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

}
