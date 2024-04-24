<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
