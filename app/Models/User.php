<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\Destination;
use App\Models\Accommodation;
use App\Models\Transportation;
use App\Models\Tour;
use App\Models\Booking;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'username',
        'country_id',
        'profile_picture',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        public function Destinations(): HasMany
        {
            return $this->hasMany(Destination::class);
        }

        public function Accommodations (): HasMany {
            return $this->hasMany(Accommodation::class);
        }

        public function Transports (): HasMany {
            return $this->hasMany(Transportation::class);
        }

        public function Tours (): HasMany {
            return $this->hasMany(Tour::class);
        }

        public function Country(): HasOne {
            return $this->hasOne(Country::class);
        }

        public function Languages(): HasMany {
            return $this->hasMany(Language::class);
        }

        public function Currency(): HasOne {
            return $this->hasOne(Currency::class);
        }

        public function Bookings(): HasMany {
            return $this->hasMany(Booking::class);
        }

        public function CustomerServices(): HasMany {
            return $this->hasMany(CustomerService::class);
        }
    }
