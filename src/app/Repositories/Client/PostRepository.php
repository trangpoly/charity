<?php

namespace App\Repositories\Client;

use App\Models\Category;

class PostRepository implements PostRepositoryInterface
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getData()
    {
        return $this->categoryModel->paginate(20);
    }
}
