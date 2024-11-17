<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
    ];
    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);

    //     if (!array_key_exists('rating', $attributes)) {
    //         $this->attributes['rating'] = mt_rand(1, 5) ;
    //     }
    // }
    protected $fillable = ['body', 'created_at','rating','user_id','product_id'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function user_info(){
        return $this->hasOne(User::class,'id','user_id');
    }

    
}
