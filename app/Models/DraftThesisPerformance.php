<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftThesisPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'C_ID',
        'M_mentorID',
        'DTP_StartDate',
        'DTP_CompletionDate',
        'DTP_PagesNum',
        'DTP_DDCgroup',
        'DTP_PrepareDays',
        'DTP_TotalPages',
    ];
}
