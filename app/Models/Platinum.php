<?php

// In app/Models/Platinum.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'P_supervisorName',
        'P_supervisorContact',
        'P_Institution',
        'P_Department',
        'P_Position',
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
