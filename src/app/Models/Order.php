<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends BaseModel
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'receiver_id',
        'giver_id',
        'quantity',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function giver()
    {
        return $this->belongsTo(User::class, 'giver_id', 'id')->withTrashed();
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->withTrashed();
    }

    public function subCategory()
    {
        return $this->hasOneThrough(
            Category::class,
            Product:: class,
            'id',
            'id',
            'product_id',
            'category_id'
        );
    }
}
