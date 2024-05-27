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
        'ED_ID',
        'id',
        'M_mentorID',
        'ED_Name',
        'ED_Uni',
        'ED_Email',
        'ED_PhoneNum',
        'ED_Research',
        'ED_Paper',
        'ED_address',
        'ED_fbname',
        'ED_edu_level',
        'ED_edu_feild',
        'ED_edu_institute',
        'ED_occupation',
        'ED_sponsorship',
        'ED_gender',
        'E_title',

    ];
}
