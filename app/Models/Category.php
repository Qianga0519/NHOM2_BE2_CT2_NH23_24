<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',  'slug'
    ];
    protected $attributes = [];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function findAllProduct($id)
    {
        return $this->findOrFail($id)->products();
    }

    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('name', 'like', '%' . $key . '%');
        }
        return $querry;
    }
}
