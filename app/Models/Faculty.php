<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Faculty extends Model
// {
//     use HasFactory;

//     protected $fillable = ['faculty_name', 'university_id'];

//     public function university()
//     {
//         return $this->belongsTo(Universities::class, 'university_id');
//     }
//     public function majors()
// {
//     return $this->hasMany(Major::class);
// }
// }


class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['university_id', 'name'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
