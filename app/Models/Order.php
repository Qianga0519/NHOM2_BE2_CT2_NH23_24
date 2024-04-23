<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'note', 'shipping', 'total', 'status', 'user_id'

    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['order_date'] = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString();
    }
    protected $attributes = [
        'status' => '0',

    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
