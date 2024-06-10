<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    //primary key associated with the table
    protected $primaryKey = 'S_staffID';

    //get the user that owns the staff
    //this defines a one to one relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'id','id');
    }
    
    protected $fillable = [
        'S_position', // Position of the staff member
        'S_department', // Department of the staff member
        'S_phone', // Phone number of the staff member
        'S_address', // Address of the staff member
        'S_skills', // Skills of the staff member
        'S_workExperience', // Work experience of the staff member
        'id' // Foreign key linking to the user
     ];

    
}
