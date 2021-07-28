<?php

namespace App\Models\Student;

use App\Models\Admin\Level;
use App\Models\Course;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function electives()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function evaluation()
    {
        return $this->hasMany(StudentEvaluation::class);
    }
}
