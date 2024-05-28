<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $primaryKey = 'P_platinumID';

    public function user()
    {
        return $this->belongsTo(User::class, 'id','id');
    }

    protected $fillable = [
        'P_supervisorName',
        'P_supervisorContact',
        'P_Institution',
        'P_Department',
        'P_Position',
        'id'
   
    ];
}
