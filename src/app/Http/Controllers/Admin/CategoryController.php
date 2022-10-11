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

        $subCategory = $this->categoryService->getProducts($id);

        return view('pages.product.category', ['category' => $category, 'subCategory' => $subCategory]);
    }

    public function subCategory($id)
    {
        $category = $this->categoryService->productsList($id);

        $products = $category->products()->paginate(4);
        return view('pages.product.sub-category', ['category' => $category, 'products' => $products]);
    }
}
