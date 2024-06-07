<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyFocusBlock extends Model
{
    use HasFactory;

    protected $table = 'weekly_focus_blocks';

    protected $fillable = [
        'FB_WeeklyFocusID',
        'P_platinumID',
        'M_mentorID',
        'FB_BlockType',
        'FB_BlockDesc',
        'FB_StartDate',
        'FB_EndDate'
    ];
}
