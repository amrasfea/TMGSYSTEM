<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'P_registration_type', 
        'P_title', 
        'P_full_name', 
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
        'P_email', 
        'P_phone', 
        'P_fb_name', 
        'P_program',
        'P_batch',
        'P_referral', 
        'P_referral_name', 
        'P_referral_batch'
    ];
}
