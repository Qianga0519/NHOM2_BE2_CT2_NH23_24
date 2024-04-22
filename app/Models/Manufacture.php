<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manufacture extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country', 'slug'
    ];
    public function manuImage(): HasOne
    {
        return $this->hasOne(ManufactureImage::class);
    }
    public function products(): HasMany
    {
        return $this->HasMany(Product::class);
    }
    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('name', 'like', '%' . $key . '%');
        }
        return $querry;
    }
}
