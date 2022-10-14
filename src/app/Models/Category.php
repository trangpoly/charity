<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Category extends BaseModel
{
    use HasApiTokens;
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name',
        'image',
        'expiration_date',
        'status',
        'parent_id'
    ];

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


    public function productsByParentCategory()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
