<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function staff()
    {
        return $this->hasOne(Staff::class, 'id');
    }

    public function mentor()
    {
        return $this->hasOne(Mentor::class, 'id');
    }

    public function platinum()
    {
        return $this->hasOne(Platinum::class, 'id');
    }
    
    protected $fillable = [
        'name',
        'email', // Ensure email is fillable
        'password',
        'roleType',
        'P_registration_type', 
        'P_title', 
        'P_identity_card',
        'P_gender', 
        'P_religion',
        'P_race', 
        'P_citizenship', 
        'P_edu_level', 
        'P_edu_field', 
        'P_edu_institute', 
        'P_occupation',
        'P_sponsorship', 
        'P_address', 
        'P_phone', 
        'P_fb_name', 
        'P_program',
        'P_batch',
        'P_referral', 
        'P_referral_name', 
        'P_referral_batch',
        'profile_photo_path'
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

}
