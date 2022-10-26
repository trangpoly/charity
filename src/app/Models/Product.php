<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'desc',
        'avatar',
        'unit',
        'weight',
        'expire_at',
        'quantity',
        'weight_unit',
        'district',
        'city',
        'address',
        'phone',
        'stock',
        'status',
        'category_id',
        'owner_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function receivers()
    {
        return $this->belongsToMany(User::class, 'orders', 'product_id', 'receiver_id')->withTrashed();
    }

    public function giver()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id')->withTrashed();
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }

    public function favourite()
    {
        return $this->belongsTo(Favourite::class, 'id', 'product_id');
    }

    public function hidePhoneNumber()
    {
        $phone = str_split($this->phone);
        $phone_length = count($phone);
        $phone_hide = '';

        foreach ($phone as $key => $num) {
            if ($key >= $phone_length - 6 && is_numeric($num)) {
                $phone_hide = $phone_hide . '*';
                continue;
            }

            $phone_hide = $phone_hide . $num;
        }

        return $phone_hide;
    }
}
