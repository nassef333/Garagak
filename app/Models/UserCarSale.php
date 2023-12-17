<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCarSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'price',
        'old_price',
        'no_passengers',
        'status',
        'mileage',
        'fuel_type',
        'gearbox',
        'description',
        'class',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }
}
