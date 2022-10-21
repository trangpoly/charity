<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favourite extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
