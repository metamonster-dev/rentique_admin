<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'points',
        'type',
        'expiration_date',
    ];

    const TYPE_REVIEW = 'review';
    const TYPE_PHOTO_REVIEW = 'photo_review';
    const TYPE_USAGE = 'usage';
    const TYPE_EXPIRATION = 'expiration';
    const TYPE_CANCEL = 'cancel';

    protected $casts = [
        'expiration_date' => 'date',
    ];

    protected $dates = ['deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
