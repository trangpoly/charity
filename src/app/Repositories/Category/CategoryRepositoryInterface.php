<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getCategories($id);

    public function getProductsBySubCategory($id);

    public function getParentCategories();

    public function getSubCategories($id);
}
