<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDomain extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table = 'expertdomains';

    protected $fillable = [
        //'name',
        'E_title',
        'E_full_name',
        'E_gender',
        'E_edu_level',
        'E_edu_field',
        'E_edu_institute',
        'E_occupation',
        'E_sponsorship',
        'E_address',
        'E_phone',
        'E_email',
        'E_fb_name'

    ];
}
