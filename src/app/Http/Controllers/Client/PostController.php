<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PostFormRequest;
use App\Models\Product;
use App\Services\BannerService;
use App\Services\CategoryService;
use App\Services\Client\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $postService;
    public $bannerService;
    protected $categoryService;

    public function __construct(
        PostService $postService,
        BannerService $bannerService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->bannerService = $bannerService;
        $this->categoryService = $categoryService;
    }

    public function create()
    {
        $data = [
            'categories' => $this->postService->getParentCategories(),
            'banners' => $this->bannerService->getBanners()
        ];

        return view('client.posts.create', $data);
    }

    public function showPostForm($id)
    {
        $subCategories = $this->postService->getSubCategories($id);
        $provinces = $this->postService->loadProvince();

        return view('client.posts.create-form', [
            'subCategories' => $subCategories,
            'provinces' => $provinces,
        ]);
    }

    public function store(PostFormRequest $request)
    {dd($request->all());
        $images = $request->images != null ? count($request->images) : 0;
        $removeImgs = $request->images_remove != null ? count(json_decode($request->images_remove)) : 0;

        if ($images - $removeImgs > 10) {
            return back()->with('imgsLimit', 'Số ảnh sản phẩm không vượt quá 10 ảnh !');
        } elseif ($images - $removeImgs == 0) {
            return back()->with('imgsLimit', 'Sản phẩm cần ít nhất 1 ảnh');
        }

        $status = $this->postService->storeProduct($request);
        $msg = $status ? 'Error! Đăng bài thất bại.' : 'Đăng bài thành công !';

        return redirect()->route('home')->with(['msg' => $msg, 'status' => $status]);
    }

    public function edit($id, $subCategoryId)
    {
        $post = $this->postService->find($id);
        $subCategory = $this->postService->findSubCategory($subCategoryId);
        $parentCategoryId = $subCategory->parent_id;
        $subCategories = $this->postService->getSubCategories($parentCategoryId);
        $provinces = $this->postService->loadProvince();

        return view('client.posts.edit', [
            'post' => $post,
            'subCategories' => $subCategories,
            'provinces' => $provinces,
        ]);
    }

    public function deleteImageProduct(Request $request)
    {
        foreach (json_decode($request->image_id_del, true) as $image_id_del) {
            $this->postService->delImage($image_id_del["id"]);
        }
    }

    public function update(PostFormRequest $request, $id)
    {
        $preImageRemove = $request->images_remove ? count(json_decode($request->images_remove)) : 0;
        $newImage = $request->images ? count($request->images) : 0;
        $hiddenImage = $request->images_hidden ? count($request->images_hidden) : 0;
        $oldImage = $request->images_old ? count(json_decode($request->images_old)) : 0;
        $limitImgMsg = 'Album khong qua 10';
        if ($oldImage - $hiddenImage + $newImage - $preImageRemove > 10) {
            return  redirect()->back()->with(['limitImgMsg' => $limitImgMsg]);
        }

        if ($request->images_hidden) {
            foreach ($request->images_hidden as $image_hidden) {
                $this->postService->delImage($image_hidden);
            }
        }

        $status = $this->postService->updateProduct($request, $id);
        $msg = $status ? 'Error! Cập nhập bài đăng thất bại.' : 'Bài Đăng của bạn đã được cập nhập !';

        return redirect()->route('home')->with(['msg' => $msg, 'status' => $status]);
    }

    public function showDuplicateForm(Product $product)
    {
        $post = $this->postService->find($product->id);
        $subCategory = $this->postService->findSubCategory($product->category_id);
        $parentCategoryId = $subCategory->parent_id;
        $subCategories = $this->postService->getSubCategories($parentCategoryId);
        $provinces = $this->postService->loadProvince();

        return view('client.posts.duplicate', [
            'post' => $post,
            'subCategories' => $subCategories,
            'provinces' => $provinces,
            'categories' => $this->categoryService->getProductsByParentCategory(),
            'banners' => $this->bannerService->getBanners()
        ]);
    }

    public function storeDuplicate(PostFormRequest $request)
    {
        $preImageRemove = $request->images_remove ? count(json_decode($request->images_remove)) : 0;
        $newImage = $request->images ? count($request->images) : 0;
        $hiddenImage = $request->images_hidden ? count($request->images_hidden) : 0;
        $oldImage = $request->images_old ? count(json_decode($request->images_old)) : 0;

        if ($oldImage - $hiddenImage + $newImage - $preImageRemove > 10) {
            return  redirect()->back()->with(['limitImgMsg' => 'Album tối đa chỉ 10 ảnh']);
        }

        $status = $this->postService->storeDuplicate($request);
        $msg = $status ? 'Error! Cập nhập bài đăng thất bại.' : 'Bài Đăng của bạn đã được cập nhập !';

        return redirect()->route('home')->with(['msg' => $msg, 'status' => $status]);
    }
}
