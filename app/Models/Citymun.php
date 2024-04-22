<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;


class Citymun extends Model
{
    use HasFactory;

    protected $fillable = [
        'citymun_name',
        'reg_code',
        'prov_code',
        'citymun_code',
        'country_id'
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
