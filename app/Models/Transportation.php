<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;
use App\Models\User;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'transpo_type',
        'transpo_description',
        'transpo_price',
        'tour_id',
        'user_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
