<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name',
        'email',
        'content'
    ];
}
