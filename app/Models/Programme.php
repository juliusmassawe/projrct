<?php

namespace App\Models;

use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Department;
use App\Models\Admin\Level;


class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'department_id',
        'level_id',
        'no_of_semesters',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }


    public function students(){
        return $this->hasMany(Student::class);
    }
}
