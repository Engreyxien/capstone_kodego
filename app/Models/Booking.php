<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Accommodation;
use App\Models\Destination;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "check_in",
        "check_out",
        "number_of_guests",
        "accommodation_id",
        "destination_id",
        "user_id",
    ];

    public function Accommodation(): BelongsTo
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function Destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
