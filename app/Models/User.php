<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function studentProfile(): HasOne
    {
        // Assumes your student profile table has a 'user_id' foreign key
        return $this->hasOne(StudentProfile::class);
    }

    /**
     * Define the one-to-one relationship with the ProviderProfile model.
     */
    public function provider(): HasOne
    {
        // Assumes your provider profile table has a 'user_id' foreign key
        return $this->hasOne(Provider::class);
    }
}
