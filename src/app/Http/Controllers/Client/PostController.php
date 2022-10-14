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
        $status = $this->postService->delImage($request->id);
    }

    public function update(PostFormRequest $request, $id)
    {
        $status = $this->postService->updateProduct($request, $id);
        $msg = $status ? 'Error! Cập nhập bài đăng thất bại.' : 'Bài Đăng của bạn đã được cập nhập !';

        return redirect()->route('home')->with(['msg' => $msg, 'status' => $status]);
    }
}
