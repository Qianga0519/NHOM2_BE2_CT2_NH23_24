<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manufacture extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country'
    ];
    public function manuImage(): HasOne
    {
        return $this->hasOne(ManufactureImage::class);
    }
}
