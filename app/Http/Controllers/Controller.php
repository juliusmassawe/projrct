<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function current_semester()
    {
        $month = date('m');
        $lead_semester = [10, 11, 12, 1, 2, 3];
        if (in_array($month, $lead_semester)){
            $semester = 1;
        }
        else{
            $semester =2;
        }

        return $semester;
    }

    public function current_academic_year()
    {
        if ($this->current_semester() != 1){
            $curent_academic_year = date('Y', strtotime('-1 year')) . '/' . date('Y');
        }
        else{
            $curent_academic_year =  date('Y'). '/' .date('Y', strtotime('+1 year'));
        }

         return $curent_academic_year ;
    }

    public function current_student_year()
    {
        $user = auth()->user()->student;
        if ($user->current_semester/2 <= 1){
            $current_year = 1;
        }
        elseif ($user->current_semester/2 > 1 && $user->current_semester/2 <= 2){
            $current_year = 2;
        }
        else{
            $current_year = 3;
        }

        return $current_year;
    }

}
