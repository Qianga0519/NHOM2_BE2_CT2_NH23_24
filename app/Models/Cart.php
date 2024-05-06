<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'carts';

    protected $fillable = [
        'product_id', 'user_id', 'qty', 'price', 'color_id'
    ];
    protected $attributes = [
        'color_id' => 0
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
   
}
