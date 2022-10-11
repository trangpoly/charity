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
        return $this->model->where('id', $id)->with('subCategory')->first();
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->where('parent_id', $id)->get();
    }

}
