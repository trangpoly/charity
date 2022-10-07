<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'desc',
        'avatar',
        'unit',
        'weight',
        'expiration',
        'quantity',
        'weight_unit',
        'address',
        'phone',
        'stock',
        'status',
        'category_id',
        'owner_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
