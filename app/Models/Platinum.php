<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_type', 
        'title', 
        'full_name', 
        'identity_card',
         'gender', 
         'religion',
        'race', 
        'citizenship', 
        'edu_level', 
        'edu_field', 
        'edu_institute', 
        'occupation',
        'sponsorship', 
        'address', 
        'phone', 
        'email', 
        'fb_name', 
        'program',
         'batch',
        'referral', 
        'referral_name', 
        'referral_batch'
    ];
}
