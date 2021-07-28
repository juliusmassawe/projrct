<?php

namespace App\Models\Lecturer;

use App\Models\Admin\Level;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('academic_year');
    }

    public function evaluations()
    {
        return $this->hasMany(LecturerEvaluation::class);
    }
}
