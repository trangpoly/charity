<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }

    public function getCategoryDetail($id)
    {
        return $this->model->with('subCategory')->find($id);
    }

    public function getListParentCategoryWithSub()
    {
        return $this->model->with('subCategory')->where('parent_id', null)->paginate(5);
    }

    public function searchCategory($nameCate, $statusCate)
    {
        if ($nameCate == null && $statusCate == 3) {
            return $this->model->where('parent_id', null)->paginate(5);
        }

        if ($nameCate && $statusCate == 3) {
            return $this->model->where('name', 'like', "%$nameCate%")->where('parent_id', null)->paginate(5);
        }

        if ($statusCate && $nameCate == null) {
            return $this->model->where('status', $statusCate)->where('parent_id', null)->paginate(5);
        }
    }

    public function paginateCategory($amountItem)
    {
        return $this->model->with('subCategory')->where('parent_id', null)->paginate($amountItem);
    }

    public function getProductsByCategory($id)
    {
        return $this->model->whereHas('products', function ($q) use ($id) {
            $q->where('category_id', $id);
        })->get();
    }

    public function getProductsByParentCategory()
    {
        return $this->model->with("productsByParentCategory")->where("parent_id" , null)->limit(4)->get();
    }

    public function getCategories($id)
    {
        return $this->model->where('id', $id)->with('subCategory')->first();
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->where('parent_id', $id)->get();
    }

    public function getParentCategories()
    {
        return $this->model->where('parent_id', null)->paginate(20);
    }

    public function getSubCategories($id)
    {
        return $this->model->where('parent_id', $id)->get();
    }

    public function findSubCategory($subCategoryId)
    {
        return $this->model->find($subCategoryId);
    }

    public function findParentCategory($parentCategoryId)
    {
        return $this->model->find($parentCategoryId);
    }
}
