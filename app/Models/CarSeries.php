<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarSeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'brand_id',
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(CarModel::class)
        ->withTimestamps();
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

}
