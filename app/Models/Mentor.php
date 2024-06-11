<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'M_mentorID';

    /**
     * Get the user that owns the mentor.
     * This defines a one-to-one relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

     /**
     * Get the publications for the mentor.
     * This defines a one-to-many relationship.
     */
    public function publications()
    {
        return $this->hasMany(Publication::class, 'M_mentorID');
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'M_phoneNum', // Phone number of the mentor
        'M_position', // Position of the mentor
        'M_title', // Title of the mentor (e.g., Dr., Mr., Ms.)
        'M_eduField', // Field of education of the mentor
        'M_employementHistory' // Employment history of the mentor
    ];
}
