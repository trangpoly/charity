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
        'expire_at',
        'quantity',
        'weight_unit',
        'district',
        'city',
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
}
