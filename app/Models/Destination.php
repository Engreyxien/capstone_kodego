<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tour;
use App\Models\User;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_name',
        'destination_description',
        'destination_image',
        'tour_id',
        'user_id'
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
