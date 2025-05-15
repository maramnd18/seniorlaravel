<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// class University extends Model
// {
//     use HasFactory;
    
//     protected $table = "universities";
    
//     protected $fillable = [
//         'name', 'founded_year', 'website',
//     ];
    
//     public function faculties()
//     {
//         return $this->hasMany(Faculty::class, 'university_id');
//     }
    
//     // New relationships for favorites
//     public function favorites()
// {
//     return $this->hasMany(Favorite::class);
// }

// public function favoritedBy()
// {
//     return $this->belongsToMany(User::class, 'favorites');
// }

// public function isFavoritedBy(?User $user)
// {
//     if (!$user) return false;
//     return $this->favoritedBy()->where('user_id', $user->id)->exists();
// }
// }
class University extends Model
{
    protected $fillable = ['name', 'logo', 'website'];

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }
}
