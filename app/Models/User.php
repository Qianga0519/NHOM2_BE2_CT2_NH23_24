<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'fullname',
        'phone',
        'city',
        'district',
        'ward',
        'address',
        'gender',
    ];
    protected $attributes = [
        'role_id' => 2
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function avatar(): HasOne
    {
        return $this->HasOne(Avatar::class);
    }
    public function cart(): HasOne
    {
        return $this->HasOne(Cart::class);
    }
    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }
    public function wishlist(): HasOne
    {
        return $this->HasOne(Wishlist::class);
    }
    public function scopeSearch($querry)
    {
        if ($key = request()->key) {
            $querry = $querry->where('name', 'like', '%' . $key . '%')
                ->orWhere('email', 'like', '%' . $key . '%')
                ->orWhereHas('role', function ($query) use ($key) {
                    $query->where('role_name', 'like', '%' . $key . '%');
                });
        }

        return $querry;
    }
}
