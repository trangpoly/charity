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

    public function getListSubCategory()
    {
        return $this->model->where('parent_id', null)->get();
    }
}
