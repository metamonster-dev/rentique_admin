<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static findOrFail($id)
 */
class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'birth_date',
        'marketing_agreement',
        'memo',
        'withdrawal_reason',
        'gender',
        'provider_type',
        'sns_id'
    ];

    protected $dates = ['deleted_at'];

    public function point(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function shippingAddress(): HasMany
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function getDefaultShippingAddressAttribute()
    {
        // 기본 배송지 가져오기
        return $this->shippingAddress()->where('is_default', 1)->first();
    }

    public function getTotalPointsAttribute()
    {
        // 포인트 합산
        return $this->point()->sum('points');
    }
}
