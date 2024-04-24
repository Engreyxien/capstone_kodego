<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Country;
use App\Models\User;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_title',
        'tour_description',
        'tour_price',
        'tour_duration',
        'country_id',
        'user_id',
    ];

    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
