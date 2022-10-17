<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Services\ProductService;
use Illuminate\Http\Request;

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
        $currentUser = $this->productService->getCurrentUser();
        $parentCategories = $this->productService->getParentCategories();

        $data = [
            'product' => $product,
            'recommend' => $recommend,
            'nearExpiryFood' => $nearExpiryFood,
            'currentUser' => $currentUser,
            'parentCategories' => $parentCategories,
        ];

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

        $subCategory = $products[0]->subCategory->category->subCategory;

        return view('pages.product.sub-category', ['products' => $products, 'subCategory' => $subCategory]);
    }

    public function submitSearch(Request $request)
    {
        $search = $this->productService->search($request);

        $subCategory = $search[0]->subCategory->category->subCategory;

        return view('pages.product.search', [
            'search' => $search,
            'subCategory' => $subCategory,
            'request' => $request
            ->except(['_token'])
        ]);
    }

    public function filter(Request $request, $id)
    {
        $sortExpireDate = $request->expire_at;

        $filterProducts = $this->productService->filter($sortExpireDate, $id);

        return response()->json($filterProducts);
    }
}
