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
     * These are the fields that can be filled using mass assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roleType', // Role of the user (e.g., admin, user, etc.)
        'P_registration_type', // Registration type of the user
        'P_title', // Title of the user (e.g., Mr., Mrs., Dr., etc.)
        'P_identity_card', // Identity card number
        'P_gender', // Gender of the user
        'P_religion', // Religion of the user
        'P_race', // Race of the user
        'P_citizenship', // Citizenship of the user
        'P_edu_level', // Educational level
        'P_edu_field', // Field of education
        'P_edu_institute', // Educational institute
        'P_occupation', // Occupation
        'P_sponsorship', // Sponsorship details
        'P_address', // Address
        'P_phone', // Phone number
        'P_fb_name', // Facebook name
        'P_program', // Program the user is enrolled in
        'P_batch', // Batch number
        'P_referral', // Referral details
        'P_referral_name', // Name of the person who referred the user
        'P_referral_batch', // Batch of the person who referred the user
        'profile_photo_path' // Path to the profile photo
    ];

    /**
     * One-to-one relationship with the Staff model.
     * This assumes that the staff and user share the same primary key.
     */
    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'id');
    }

    /**
     * One-to-one relationship with the Mentor model.
     * This assumes that the mentor and user share the same primary key.
     */
    public function mentor()
    {
        return $this->hasOne(Mentor::class, 'id', 'id');
    }

    /**
     * One-to-one relationship with the Platinum model.
     * This assumes that the platinum and user share the same primary key.
     */
    public function platinum()
    {
        return $this->hasOne(Platinum::class, 'id', 'id');
    }
}

