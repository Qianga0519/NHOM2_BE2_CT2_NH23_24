<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

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
    public function manufacture(): BelongsTo
    {
        return $this->BelongsTo(Manufacture::class);
    }
    public function banner(): HasMany
    {
        return $this->HasMany(Banner::class);
    }
    public function reviews(): HasMany
    {
        return $this->HasMany(Review::class);
    }
    public function wishlist(): HasMany
    {
        return $this->HasMany(Wishlist::class);
    }
    public function productFeature()
    {
        return Product::where('feature', 1);
    }
    public function feature()
    {
        $feature = Product::where(['id' => $this->id, 'feature' => 1])->first();
        return $feature ? true : false;
    }
    public function productSale()
    {
        return  $this->orderBy('created_at', 'DESC')->where('sale_amount', '>', 0);
    }
    public function getFavorited()
    {
        if (Auth::check()) {

            $favor = Wishlist::where(['product_id' => $this->id, 'user_id' => Auth::user()->id])->first();
            return $favor ? true : false;
        } else {

            return false;
        }
    }


    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('name', 'like', '%' . $key . '%');
        }
        return $querry;
    }
}
