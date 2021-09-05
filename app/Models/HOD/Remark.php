<?php

namespace App\Models\HOD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'role_id', 'remarks', 'academic_year'];
}
