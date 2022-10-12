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

    public function getParentCategories()
    {
        return $this->model->where('parent_id', null)->paginate(20);
    }

    public function getSubCategories($id)
    {
        return $this->model->where('parent_id', $id)->get();
    }
}
