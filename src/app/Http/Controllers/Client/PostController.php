<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PostFormRequest;
use App\Services\Client\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create()
    {
        $categories = $this->postService->getParentCategories();

        return view('client.posts.create', ['categories' => $categories]);
    }

    public function showPostForm($id)
    {
        $subCategories = $this->postService->getSubCategories($id);

        return view('client.posts.create-form', ['subCategories' => $subCategories]);
    }

    public function store(PostFormRequest $request)
    {
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

        return view('client.posts.edit', ['post' => $post, 'subCategories' => $subCategories]);
    }

    public function deleteImageProduct(Request $request)
    {
        foreach (json_decode($request->image_id_del, true) as $image_id_del) {
            $this->postService->delImage($image_id_del["id"]);
        }
    }

    public function update(Request $request, $id)
    {
        $newImage = $request->images ? count($request->images) : 0;
        $hiddenImage = $request->images_hidden ? count($request->images_hidden) : 0;
        $oldImage = $request->images_old ? count(json_decode($request->images_old)) : 0;
        $limitImgMsg = 'Album khong qua 10';
        if ($oldImage - $hiddenImage + $newImage > 10) {
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
}
