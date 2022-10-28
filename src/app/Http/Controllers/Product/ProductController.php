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

        return view('admin.product.create', ['subCategory' => $subCategory]);
    }

    public function saveCreate(ProductRequest $request)
    {
        $this->productService->saveCreate($request);

        return redirect()->route('web.admin.product.list');
    }

    public function update(Product $id)
    {
        $subCategory = $this->productService->getSubCategory();

        return view('admin.product.update', ['subCategory' => $subCategory, 'product' => $id]);
    }

    public function saveUpdate($id, ProductRequest $request)
    {
        $status = $this->productService->updateProduct($id, $request);

        if ($status == false) {
            session(['msg' => 'San pham phai chua toi da 1 anh']);
            return back();
        }

        if ($request->has('avatar')) {
            $this->productService->createProductImage($id, $request);
        }

        $this->productService->updateProduct($id, $request);

        return redirect()->route('web.admin.product.list');
    }

    public function delete($id)
    {
        $this->productService->delete($id);

        session(['msg' => 'Delete successfully !']);

        return redirect()->back();
    }

    public function getProductsBySubCategory($id)
    {
        $products = $this->productService->getProductsBySubCategory($id);

        $subCategory = $products[0]->subCategory->category->subCategory;

        return view('pages.product.sub-category', [
            'products' => $products,
            'subCategory' => $subCategory,
            'id' => $id
        ]);
    }

    public function filter($id)
    {
        if ($_GET['sort']) {
            $sortExpireDate = $_GET['sort'];

            $filterProducts = $this->productService->filter($sortExpireDate, $id);
        } else {
            $filterProducts = $this->productService->getProductsBySubCategory($id);
        }
        $subCategory = $this->categoryService->getSubCategoriesProduct();

        return view('pages.product.sub-category', [
            'products' => $filterProducts,
            'subCategory' => $subCategory,
            'id' => $id
        ]);
    }

    public function submitSearch(Request $request, $id)
    {
        $subCategory = $this->categoryService->getProductsBySubCategory($id);

        $search = $this->productService->search($request);

        return view('pages.product.search', [
            'id' => $id,
            'search' => $search,
            'subCategory' => $subCategory,
            'request' => $request
                ->except(['_token']),
            'subCt' => $request->subCate  ?? "",
        ]);
    }

    public function filterSearch($id)
    {
        $subCate = $_GET['subCate'];

        if ($_GET['sort']) {
            $sortExpireDate = $_GET['sort'];

            $filterProducts = $this->productService->filterSearch($sortExpireDate, $id, $subCate);
        } else {
            $filterProducts = $this->productService->search($id);
        }

        $subCategory = $this->categoryService->getSubCategoriesProduct();

        return view('pages.product.search', [
            'search' => $filterProducts,
            'subCategory' => $subCategory,
            'id' => $id,
            'subCt' => $subCate
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
        $data = [];
        $data['categories'] = $this->categoryService->getProductsByParentCategory();
        $data['banners'] = $this->bannerService->getBanners();
        $data['nameProduct'] = $request->name_product;
        $data['products'] = $this->productService->searchProductByName($request->all());

        return view("pages.product.search-by-name", ["data" => $data]);
    }
}
