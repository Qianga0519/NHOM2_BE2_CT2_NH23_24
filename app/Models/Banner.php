<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected  $fillable = [
        'name', 'product_id'
    ];
    public function image(): HasOne
    {
        return $this->hasOne(BannerImage::class);
    }
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
}
