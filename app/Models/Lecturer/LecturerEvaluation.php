<?php

namespace App\Models\Lecturer;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerEvaluation extends Model
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

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
