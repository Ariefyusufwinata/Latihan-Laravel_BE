<?php

namespace App\Models;

use App\Traits\GenerateUUIDTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/***
 * Using Traits
 *
 * Traits is solution when model multiple declaration
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, GenerateUUIDTraits;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    protected $uuidAttribute = 'uuid';

    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

/***
 * Using Boot Method
 *
 * Bot is solution when model single declaration
 */
//class User extends Authenticatable
//{
//    use HasApiTokens, HasFactory, Notifiable;
//
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
//
//    protected $hidden = [
//        'id',
//        'password',
//        'remember_token',
//    ];
//
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
//    ];
//
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($model) {
//            $model->uuid = Str::uuid();
//        });
//    }
//}
