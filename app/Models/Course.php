<?php

namespace App\Models;

use App\Models\Admin\Department;
use App\Models\Lecturer\Lecturer;
use App\Models\Lecturer\LecturerEvaluation;
use App\Models\Student\Student;
use App\Models\Student\StudentEvaluation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'ante',
        'nature',
        'credits',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function programme(){
        return $this->belongsTo(Programme::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class)
            ->withPivot('academic_year')
            ->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)
            ->withTimestamps();
    }

    public function studentEvaluations()
    {
        return $this->hasMany(StudentEvaluation::class);
    }

    public function lecturerEvaluations()
    {
        return $this->hasMany(LecturerEvaluation::class);
    }

    public function summaries()
    {
        return $this->hasMany(\App\Models\Lecturer\Summary::class);
    }
}
