<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Services\ProductService;

class ProductController extends BaseController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProduct($id)
    {
        $product = $this->productService->getProduct($id);

        return view('pages.product.detail')->with('product', $product);
    }

    public function list()
    {
        $products = $this->productService->list();

        return view('admin.product.list', ['products' => $products]);
    }

    public function getProductsBySubCategory($id)
    {
        $products = $this->productService->getProductsBySubCategory($id);

        return view('pages.product.sub-category', ['products' => $products]);
    }
}
