<?php

// In app/Models/Platinum.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'P_supervisorName', // Supervisor's name
        'P_supervisorContact', // Supervisor's contact information
        'P_Institution', // Institution of the platinum member
        'P_Department', // Department of the platinum member
        'P_Position', // Position of the platinum member
        'id' // Foreign key linking to the user
    ];

    /**
     * Get the user that owns the platinum.
     * This defines a one-to-one relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the publications for the platinum member.
     * This defines a one-to-many relationship.
     */
    public function publications()
    {
        return $this->hasMany(Publication::class, 'P_platinumID', 'id');
    }

}
