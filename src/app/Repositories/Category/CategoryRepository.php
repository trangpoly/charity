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
        if ($nameCate == null && $statusCate == null) 
        {
            return $this->model->with('subCategory')->where('parent_id', null)->paginate(5);
        }

        if ($nameCate && $statusCate == null) 
        {
            return $this->model->with('subCategory')->where('name', 'like', "%$nameCate%")->where('parent_id', null)->paginate(5);
        }

        if ($nameCate == null && $statusCate) 
        {
            return $this->model->with('subCategory')->where('status', $statusCate)->where('parent_id', null)->paginate(5);
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
}
