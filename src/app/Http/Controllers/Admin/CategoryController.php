<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function list()
    {
        return view('admin.pages.categories.list');
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function category($id)
    {
        $category = $this->categoryService->find($id);

        $subCategory = $this->categoryService->getProductsBySubCategory($id);

        return view('pages.product.category', ['category' => $category, 'subCategory' => $subCategory]);
    }
}
