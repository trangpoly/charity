<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Product;
use App\Services\BannerService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $productService;

    protected $categoryService;

    protected $bannerService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        BannerService $bannerService
    ) {
        $this->productService = $productService;

        $this->categoryService = $categoryService;

        $this->bannerService = $bannerService;
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
            'categories' => $this->categoryService->getProductsByParentCategory(),
            'banners' => $this->bannerService->getBanners()
        ];

        return view('pages.product.detail', $data);
    }

    public function list()
    {
        $products = $this->productService->list();

        $subCategory = $this->productService->getSubCategory();

        return view('admin.product.list', ['products' => $products, 'subCategory' => $subCategory]);
    }

    public function create()
    {
        $subCategory = $this->productService->getSubCategory();

        $provinces = $this->productService->getProvince();

        return view('admin.product.create', ['subCategory' => $subCategory, 'provinces' => $provinces]);
    }

    public function saveCreate(ProductRequest $request)
    {
        $this->productService->saveCreate($request);

        session(['msg' => 'Thêm thành công!']);

        session(['status' => false]);

        return redirect()->route('web.admin.product.list');
    }

    public function update($id)
    {
        $product = $this->productService->find($id);

        $subCategory = $this->productService->getSubCategory();

        $provinces = $this->productService->getProvince();

        return view(
            'admin.product.update',
            [
                'subCategory' => $subCategory,
                'product' => $product,
                'provinces' => $provinces
            ]
        );
    }

    public function saveUpdate($id, ProductRequest $request)
    {
        if ($request->has('images')) {
            $this->productService->createProductImage($id, $request);
        }

        $this->productService->updateProduct($id, $request);

        session(['msg' => 'Cập nhật thành công!']);

        session(['status' => false]);

        return redirect()->route('web.admin.product.list');
    }

    public function delete($id)
    {
        $this->productService->delete($id);

        session(['msg' => 'Xóa thành công!']);

        session(['status' => false]);

        return redirect()->back();
    }

    public function getProductsBySubCategory($id)
    {
        $products = $this->productService->getProductsBySubCategory($id);

        $subCategory = $products[0]->subCategory->category->subCategory;

        $provinces = $this->productService->getProvince();

        $banners = $this->bannerService->getBanners();

        return view('pages.product.sub-category', [
            'products' => $products,
            'subCategory' => $subCategory,
            'id' => $id,
            'provinces' => $provinces,
            'banners' => $banners
        ]);
    }

    public function filter($id)
    {
        if (request('sort')) {
            $sortExpireDate = request('sort');

            $filterProducts = $this->productService->filter($sortExpireDate, $id);
        } else {
            $filterProducts = $this->productService->getProductsBySubCategory($id);
        }

        $subCategory = $filterProducts[0]->subCategory->category->subCategory;

        $provinces = $this->productService->getProvince();

        $banners = $this->bannerService->getBanners();

        return view('pages.product.sub-category', [
            'products' => $filterProducts,
            'subCategory' => $subCategory,
            'id' => $id,
            'provinces' => $provinces,
            'banners' => $banners

        ]);
    }

    public function submitSearch(Request $request, $id)
    {
        $subCategory = $this->categoryService->getProductsBySubCategory($id);

        $search = $this->productService->search($request);

        $provinces = $this->productService->getProvince();

        $banners = $this->bannerService->getBanners();

        if ($request->subCate) {
            $subCate = $request->subCate;
        } else {
            $subCate[] = $request->subCate ?? "";
        }

        return view('pages.product.search', [
            'id' => $id,
            'search' => $search,
            'subCategory' => $subCategory,
            'request' => $request
                ->except(['_token']),
            'subCt' => $subCate,
            'provinces' => $provinces,
            'banners' => $banners

        ]);
    }

    public function filterSearch($id)
    {
        $subCate = request('subCate');

        $sortExpireDate = request('sort');

        if ($subCate[0] == null) {
            $filterProducts = $this->productService->filterSearchAll($sortExpireDate, $id);
        } else {
            $filterProducts = $this->productService->filterSearch($sortExpireDate, $subCate);
        }

        $subCategory = $filterProducts[0]->subCategory->category->subCategory;

        $provinces = $this->productService->getProvince();

        $banners = $this->bannerService->getBanners();

        return view('pages.product.search', [
            'search' => $filterProducts,
            'subCategory' => $subCategory,
            'id' => $id,
            'subCt' => $subCate,
            'provinces' => $provinces,
            'banners' => $banners
        ]);
    }

    public function addFavourite(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;
        $this->productService->addFavourite($userId, $productId);
    }

    public function removeFavourite(Request $request)
    {
        $favouriteId = $request->favourite_id;
        $this->productService->removeFavourite($favouriteId);
    }

    public function searchByNameAndSort(Request $request)
    {
        $data = [
            'categories' => $this->categoryService->getProductsByParentCategory(),
            'banners' => $this->bannerService->getBanners(),
            'nameProduct' => $request->name_product,
            'products' => $this->productService->searchProductByName($request->all()),
            'sort' => $request->sort
        ];
        return view("pages.product.search-by-name", $data);
    }
}
