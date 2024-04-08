<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price', 'feature',
        'qty', 'sale_amount',
        'category_id',
        'manufacture_id',
    ];

    public function productImage(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
    public function colors(): belongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
    public function banner(): HasMany
    {
        return $this->HasMany(Banner::class);
    }
    public function review(): HasMany
    {
        return $this->HasMany(Review::class);
    }
    public function productFeature()
    {
        return $this->orderBy('created_at', 'DESC')->where('feature', '=', 1);
    }
    public function productSale()
    {
        return  $this->orderBy('created_at', 'DESC')->where('sale_amount', '>', 0);
    }

    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('name', 'like', '%' . $key . '%');
        }
        return $querry;
    }
}
