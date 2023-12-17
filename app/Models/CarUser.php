<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'model_id',
        'color',
        'plate',
    ];

    protected $table = 'car_user';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }
}
