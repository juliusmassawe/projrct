<?php

namespace App\Models\Admin;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;


class Department extends Model
{
    use HasFactory;

    public function head_of_department(){
        return $this->hasOne(HeadOfDepartment::class);
    }

    public function programmes(){
        return $this->hasMany(Programme::class);
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
