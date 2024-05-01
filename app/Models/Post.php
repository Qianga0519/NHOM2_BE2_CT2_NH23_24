<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'content', 'title', 'user_id'
    ];
    public function postImage(): HasOne
    {
        return $this->hasOne(PostImage::class);
    }
    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('title', 'like', '%' . $key . '%')->orwhere('content', 'like', '%' . $key . '%');
        }
        return $querry;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // public function postImage(): HasOne
    // {
    //     return $this->HasOne(PostImage::class);
    // }
}
