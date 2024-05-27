<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $primaryKey = 'M_mentorID';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    protected $fillable = [
        'M_phoneNum',
        'M_position',
        'M_title',
        'M_eduField',
        'M_employementHistory'
   
    ];
}
