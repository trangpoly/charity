<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function getProductDetail($id)
    {
        return $this->model->with(['images', 'receivers'])->findOrFail($id);
    }

    public function getProductsBySubCategory($id)
    {
        return $this->model->whereHas('subCategory', function ($q) use ($id) {
            $q->where('id', $id);
        })->paginate(4);
    }
}
