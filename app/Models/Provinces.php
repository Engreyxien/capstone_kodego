<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Country;

class Provinces extends Model
{
    use HasFactory;

    protected $fillable= [
        'province_name',
        'reg_code',
        'prov_code',
        'country_id'
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
