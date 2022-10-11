<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function receivers()
    {
        return $this->belongsToMany(User::class, 'orders', 'product_id', 'receiver_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
