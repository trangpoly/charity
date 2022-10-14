<?php

namespace App\Repositories\ProductImage;

use App\Models\ProductImage;
use App\Repositories\BaseRepository;

class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{
    public function model()
    {
        return ProductImage::class;
    }

    public function delImage($id)
    {
        return $this->model->destroy($id);
    }
}
