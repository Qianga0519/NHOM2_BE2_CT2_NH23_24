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
}
