<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tour;
use App\Models\Accommodation;

class CostumerService extends Model
{
    use HasFactory;

    protected $fillable = [
        'cs_name',
        'cs_description',
        'user_id',
        'tour_id',
        'accommodation_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

}
