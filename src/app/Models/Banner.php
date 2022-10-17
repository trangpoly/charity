<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'path',
        'index_position',
    ];
}
