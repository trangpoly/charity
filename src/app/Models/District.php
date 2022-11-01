<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends BaseModel
{
    use HasFactory;

    protected $table = 'district';
    protected $primaryKey = 'id';
}
