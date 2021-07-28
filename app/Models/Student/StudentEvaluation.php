<?php

namespace App\Models\Student;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'academic_year',
        'class_test',
        'assignment',
        'correction',
        'test_returned',
        'understanding',
        'material_available',
        'well_organized',
        'recommend',
        'meet_expectations',
        'helpful',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
