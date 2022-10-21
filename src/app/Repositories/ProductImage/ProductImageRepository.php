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

    public function deleteMultiple($ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    public function countImages($id)
    {
      return $this->model->where('product_id', $id)->groupBy('product_id')->count();
    }
}
