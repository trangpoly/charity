<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function find($id)
    {
        return $this->categoryRepository->getCategories($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->categoryRepository->getProductsBySubCategory($id);
    }
}
