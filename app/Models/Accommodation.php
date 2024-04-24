<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Destination;
use App\Models\User;
use App\Models\Citymun;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_name',
        'accommodation_description',
        'accommodation_type',
        'accommodation_address',
        'accommodation_price',
        'accommodation_image',
        'contact_info',
        'destination_id',
        'citymun_id',
        'user_id'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function citymun()
    {
        return $this->belongsTo(Citymun::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
