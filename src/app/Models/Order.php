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
}
