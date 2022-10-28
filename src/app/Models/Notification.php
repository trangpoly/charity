<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends BaseModel
{
    use HasFactory;
    use uuid;

    protected $fillable = [
        'title',
        'type',
        'relate_id', 
        'actor_id',
        'notifier_id',
        'read_at',
    ];
}
