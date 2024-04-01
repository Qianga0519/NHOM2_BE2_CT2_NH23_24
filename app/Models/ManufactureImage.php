<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufactureImage extends Model
{
    use HasFactory;
    protected $table = 'manufacture_image';
    protected $fillable = [
        'name',    'url',    'manufacture_id',

    ];
}
