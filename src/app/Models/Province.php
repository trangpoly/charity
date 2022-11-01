<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends BaseModel
{
    use HasFactory;

    protected $table = 'province';
    protected $primaryKey = 'id';

    public function districts()
    {
        return $this->hasMany(District::class, '_province_id', 'id');
    }
}
