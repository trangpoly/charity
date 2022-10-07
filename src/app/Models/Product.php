<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;
    use Uuid;

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
