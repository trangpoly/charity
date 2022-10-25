<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'path',
        'status'
    ];
}
