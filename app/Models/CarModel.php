<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'car_series_id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['color', 'plate'])
            ->withTimestamps();
    }

    public function carSeries(): BelongsTo
    {
        return $this->belongsTo(CarSeries::class);
    }

    public function carSeriesList(): BelongsToMany
    {
        return $this->belongsToMany(CarSeries::class)->withTimestamps();
    }

    public function userSales(): HasMany
    {
        return $this->hasMany(UserCarSale::class);
    }
}
