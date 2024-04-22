<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_unit',
        'currency_name',
        'currency_code',
        'currency_symbol',
        'user_id',
        'country_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
