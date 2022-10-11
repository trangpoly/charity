<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    protected $categoryRepository;

    private const PAGE_LIMIT = 10;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getCategoryDetail($id);
    }

    public function list(array $options = [], $limit = self::PAGE_LIMIT)
    {
        return $this->categoryRepository->paginate($options, $limit);
    }

    public function create($attribute)
    {
        return $this->categoryRepository->create($attribute);
    }

    public function getListParentCategory()
    {
        return $this->categoryRepository->getListParentCategory();
    }

    public function getListSubCategory()
    {
        return $this->categoryRepository->getListSubCategory();
    }
}
