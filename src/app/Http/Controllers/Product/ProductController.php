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
        // dd($product);

        return view('pages.product.detail')->with('product', $product);
    }

    function list() {
        $products = $this->productService->list();

        return view('admin.product.list', ['products' => $products]);
    }
}
