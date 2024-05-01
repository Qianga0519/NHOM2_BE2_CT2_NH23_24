<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['rate', 'content', 'user_id', 'product_id'];
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('content', 'like', '%' . $key . '%')->orWhereHas('product', function ($query) use ($key) {
                $query->where('name', 'like', '%' . $key . '%');
            });;
        }

        return $querry;
    }
}
