<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getParentCategories();

    public function getSubCategories($id);

    public function findSubCategory($subCategoryId);

    public function findParentCategory($parentCategoryId);
}
