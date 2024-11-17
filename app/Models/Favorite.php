<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
    ];
    
    protected $fillable = ['user_id' ,'product_id' ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user_info(){
        return $this->hasOne(User::class);
    }

    public $timestamps = false;
}
