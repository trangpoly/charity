<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProductImage extends BaseModel
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Uuid;

    protected $table = 'product_images';

    protected $fillable = [
        'path',
        'product_id',
    ];
}
