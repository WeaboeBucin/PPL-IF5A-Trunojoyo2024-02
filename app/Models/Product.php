<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'rating',
        'status',
        'photo',
        'merchant_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'price' => 'integer',
        'rating' => 'float',
        // 'merchant_id' => 'integer',
        'category_id' => 'integer'
    ];


    public $timestamps = false;


    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }
    public function getReview()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id')->with('user_info')->orderBy('id', 'DESC');
    }
    public static function getProductBySlug($slug)
    {
        return self::where('id', $slug)->with(['merchant', 'getReview'])->first();
    }
    public function getAverageRatingAttribute()
    {
        return $this->comments()->avg('rating');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
