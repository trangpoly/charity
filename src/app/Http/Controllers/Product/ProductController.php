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
        $recommend = $this->productService->getRecommend($product->id, $product->category_id);
        $nearExpiryFood = $this->productService->getNearExpiryFood($product->id);

        $data = array();
        $data['product'] = $product;
        $data['recommend'] = $recommend;
        $data['nearExpiryFood'] = $nearExpiryFood;

        return view('pages.product.detail', $data);
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
