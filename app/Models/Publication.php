<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $primaryKey = 'PB_ID';

    protected $fillable = [
        'PB_Type',
        'PB_Title',
        'PB_Author',
        'PB_Uni',
        'PB_Course',
        'PB_Page',
        'PB_Detail',
        'PB_Date',
        'file_path',
        'P_platinumID',
    ];

    public function platinum()
    {
        return $this->belongsTo(Platinum::class, 'P_platinumID');
    }
}


     

