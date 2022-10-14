<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Carbon;

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

    public function getCategories($id)
    {
        return $this->model->where('id', $id)->with('subCategory')->first();
    }
}
