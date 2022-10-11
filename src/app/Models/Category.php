<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name',
        'image',
        'status',
        'parent_id'
    ];

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
