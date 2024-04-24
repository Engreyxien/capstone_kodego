<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
