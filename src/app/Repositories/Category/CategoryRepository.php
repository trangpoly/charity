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

    public function getCategories($id)
    {
        return $this->model::with('subCategory')->where('id', $id)->first();
    }

    public function getProducts($id)
    {
        return $this->model->where('parent_id', $id)->with('products')->get();
    }

    public function productsList($id)
    {
        return $this->model->where('id', $id)->with('products')->first();
    }
}
