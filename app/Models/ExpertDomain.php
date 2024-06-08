<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDomain extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table = 'expertdomains';

    protected $primaryKey = 'ED_ID';

    protected $fillable = [
        'ED_ID',
        'id',
        'M_mentorID',
        'ED_Name',
        'ED_Uni',
        'ED_Email',
        'ED_PhoneNum',
        'ED_address',
        'ED_fbname',
        'ED_edu_level',
        'ED_edu_field',
        // 'ED_edu_institute',
        'ED_occupation',
        'ED_sponsorship',
        'ED_gender',
        'E_title',
        'p_platinumID'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'M_mentorID');
    }

    public function research()
    {
        return $this->belongsTo(Research::class, 'ED_ID', 'R_researchID');
    }

    public function publications()
    {
        return $this->belongsTo(Publication::class, 'ED_ID', 'PB_ID');
    }

}
