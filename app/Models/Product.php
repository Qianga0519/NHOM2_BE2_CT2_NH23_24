<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function getAllProduct()
    {
        return $this->all();
    }
}
