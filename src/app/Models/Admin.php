<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends BaseModel implements Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    use Uuid;
    use AuthenticableTrait;

    protected $fillable = [
        'name',
        'account',
        'email',
        'password',
        'role',
        'status',
    ];
}
