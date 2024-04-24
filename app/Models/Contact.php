<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'phone',  'subject', 'message'];
    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('message', 'like', '%' . $key . '%')->orwhere('subject', 'like', '%' . $key . '%');
        }
        return $querry;
    }
}
