<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends BaseModel
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'title',
        'type',
        'relate_id',
        'actor_id',
        'notifier_id',
        'read_at',
    ];

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id', 'id');
    }
}
