<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $primaryKey = 'PB_ID';

    protected $fillable = [
        'PB_ID',
        'P_platinumID',
        'M_mentorID',
        'ED_ID',
        'PB_Type',
        'PB_Title',
        'PB_Author',
        'PB_Uni',
        'PB_Course',
        'PB_Page',
        'PB_Detail',
        'PB_Date',
        'file_path',
    ];

    protected $table='publications';

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'M_mentorID');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'P_platinumID', 'id');
}

    public function research()
    {
        return $this->belongsTo(Research::class, 'R_researchID', 'R_researchID');
    }

    public function expertDomain()
    {
        return $this->belongsTo(ExpertDomain::class, 'ED_ID');
    }
    public function platinum()
    {
        return $this->belongsTo(Platinum::class, 'P_platinumID');
    }
}

