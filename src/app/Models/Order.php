<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends BaseModel
{
    use HasFactory;
    use Uuid;

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
        return $this->belongsTo(User::class, 'giver_id', 'id');
    }
}
