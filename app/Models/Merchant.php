<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'address',
        'type',
        'owner',
        'logo',
        'cover',
        'latitude', 
        'longitude'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => 'integer',
        'password' => 'hashed',
    ];

    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public static function getMerchantBySlug($slug)
    {
        return self::where('id', $slug)->first();
    }
}
