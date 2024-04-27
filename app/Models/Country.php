<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'country_description',
    ];

  public function User(): HasMany
  {
      return $this->hasMany(User::class);
  }
}
