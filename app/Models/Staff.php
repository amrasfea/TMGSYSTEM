<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'S_staffID';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
    protected $fillable = [
       'S_position',
       'S_department',
       'S_phone',
       'S_address',
       'S_skills',
       'S_workExperience'
    ];
}
