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

    public function create($attribute)
    {
        return $this->categoryRepository->create($attribute);
    }

    public function getListParentCategoryWithSub()
    {
        return $this->categoryRepository->getListParentCategoryWithSub();
    }

    public function update($id, $data = [])
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function searchCategory($nameCate, $statusCate)
    {
        return $this->categoryRepository->searchCategory($nameCate, $statusCate);
    }

    public function paginateCategory($amountItem)
    {
        return $this->categoryRepository->paginateCategory($amountItem);
    }

    public function getProductsByCategory($id)
    {
        return $this->categoryRepository->getProductsByCategory($id);
    }

    public function getProductsByParentCategory()
    {
        return $this->categoryRepository->getProductsByParentCategory();
    }

    public function find($id)
    {
        return $this->categoryRepository->getCategories($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->categoryRepository->getProductsBySubCategory($id);
    }

    public function getSubCategoriesProduct()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }
}
