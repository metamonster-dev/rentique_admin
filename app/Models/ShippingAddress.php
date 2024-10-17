<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAddress extends Model
{
    use hasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'address_name',
        'recipient_name',
        'phone_number_1',
        'phone_number_2',
        'post_code',
        'address1',
        'address2',
        'is_default',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
