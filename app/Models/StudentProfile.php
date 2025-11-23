<?php

// app/Models/StudentProfile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    // Set the table name if it deviates from Laravel convention (e.g., 'student_profiles')
    protected $table = 'student_profiles';

    protected $fillable = [
        'user_id',          // The foreign key linking back to users table
        'university_name',  // The field you are trying to save
        // ... other student fields ...
    ];

    // Add the inverse relationship back to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
