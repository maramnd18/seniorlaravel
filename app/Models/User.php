<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use App\Models\University;
use App\Models\Role;


class User extends Authenticatable
{
    const ROLE_ADMIN = 'admin';
    const ROLE_UNIVERSITY_MANAGEMENT = 'university_management';
    const ROLE_STUDENT = 'student';
    const ROLE_ALUMNUS = 'alumnus';

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // app/Models/User.php

// app/Models/User.php

protected $fillable = [
    'first_name',
    'last_name',
    'username',
    'email',
    'password',
    'gender',
    'is_admin',

];


    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUniversityManagement()
    {
        return $this->role === self::ROLE_UNIVERSITY_MANAGEMENT;
    }

    public function isStudent()
    {
        return $this->role === self::ROLE_STUDENT;
    }

    public function isAlumnus()
    {
        return $this->role === self::ROLE_ALUMNUS;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    public function favoriteUniversities()
    {
        return $this->belongsToMany(University::class, 'favorites')->withTimestamps();
    }
    public function role()
{
    return $this->belongsTo(Role::class);
}

}