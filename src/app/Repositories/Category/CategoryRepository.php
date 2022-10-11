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
        return $this->model->find($id);
    }

    public function getListParentCategory()
    {
        return $this->model->with('parentCategory')->get();
    }

    public function getListSubCategory()
    {
        return $this->model->with('subCategory')->where('parent_id', null)->get();
    }
}
