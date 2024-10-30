<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = ['body', 'sender_id', 'sender_type'];

    public function sender()
    {
        return $this->morphTo();
    }
}