<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $primaryKey = 'R_researchID';

    protected $fillable = [
        'P_platinumID',
        'R_title'
    ];

    public function expertDomain()
    {
        return $this->belongsTo(ExpertDomain::class, 'ED_ID');
    }
}
