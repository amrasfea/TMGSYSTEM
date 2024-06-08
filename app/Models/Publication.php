<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $primaryKey = 'PB_ID';

    protected $fillable = [
        'P_platinumID',
        'Mentor_ID',
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

    public function user()
{
    return $this->belongsTo(User::class, 'P_platinumID', 'id');
}

}

