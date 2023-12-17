<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class)
        ->withTimestamps();
    }

    public function hasCoupon(Coupon $coupon): bool
    {
        return $this->coupons->contains($coupon);
    }

    public function carModels()
    {
        return $this->belongsToMany(CarModel::class, 'car_user', 'user_id', 'model_id')
            ->withPivot(['color', 'plate'])
            ->withTimestamps();
    }

    public function carSales(): HasMany
    {
        return $this->hasMany(UserCarSale::class);
    }

    public function garageReviews(): HasMany
    {
        return $this->hasMany(UserGarageReview::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'blocked_due',
        'cancelations',
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
        'password' => 'hashed',
        'blocked_due' => 'datetime',
    ];
}
