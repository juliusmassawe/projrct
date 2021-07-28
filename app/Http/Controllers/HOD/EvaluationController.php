<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer\LecturerEvaluation;
use App\Models\Programme;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\PieChart;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {

        $programmes = Programme::with('department')->where('department_id' , auth()->user()->head_of_department->department_id)->get();
        return view('hod.evaluations.index', compact( 'programmes'));
    }

    public function view(Programme $programme, $year)
    {
       $courses =  $programme->courses->where('semester', $this->current_semester())->where('year', $year);

        $studentEv=[];
        $lecturerEv = [];

        foreach ($courses as $course) {
            $evaluations = $course->studentEvaluations->where('academic_year', session()->get('academic_year'))->count();
            $students = $programme->students()->where('current_semester', $course->sem)->where('current_academic_year', $this->current_academic_year())->count();

            if ($students > 0){
                $studentEv[$course->id] = $evaluations/$students * 100;
            }
            else{
                $studentEv[$course->id] = 0;
            }

           $lecturerEv[$course->id] = $course->LecturerEvaluations->where('academic_year', session()->get('academic_year'))->count();

        }

        return view('hod.evaluations.view', compact('courses', 'programme', 'studentEv', 'lecturerEv'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        $students =  $course->studentEvaluations->where('academic_year', session()->get('academic_year'));

        $evaluations = $course->studentEvaluations->where('academic_year', session()->get('academic_year'))->where('course_id', $course->id)->count();
        $students_count = $course->programme->students()->where('current_semester', $course->sem)->where('current_academic_year', $this->current_academic_year())->count();

        if ($students_count > 0){
            $studentEv = $evaluations/$students_count * 100;
        }
        else{
            $studentEv = 0;
        }

        $class_test = new PieChart();
        $class_test->setTitle('1. If class tests were done')
        ->addData([$students->where('class_test', 1)->count(), $students->where('class_test', 2)->count()])
        ->setLabels(['Not Done', 'Done'])
            ->setColors(['#ff6384', '#ffc63b']);

        $assignment = new PieChart();
        $assignment->setTitle('2. If assignments were done')
            ->addData([$students->where('assignment', 1)->count(), $students->where('assignment', 2)->count()])
            ->setLabels(['Not Done', 'Done'])
            ->setColors(['#2a9d8f', '#023047']);

        $corrections = new PieChart();
        $corrections->setTitle('3. If corrections were done')
            ->addData([$students->where('correction', 1)->count(), $students->where('correction', 2)->count()])
            ->setLabels(['Not Done', 'Done'])
            ->setColors(['#0077b6', '#fca311']);

        $tests_returned = new PieChart();
        $tests_returned->setTitle('4. If tests were returned')
            ->addData([$students->where('test_returned', 1)->count(), $students->where('test_returned', 2)->count(), $students->where('test_returned', 3)->count(), $students->where('test_returned', 4)->count(), $students->where('test_returned', 5)->count()])
            ->setLabels(['Never', 'Sometimes', 'Returned', 'Much', 'Everytime'])
            ->setColors(['#774936', '#ef476f', '#0077b6', '#fca311'. '#2a9d8f']);

        $understanding = new PieChart();
        $understanding->setTitle('5. Understanding Level')
            ->addData([$students->where('understanding', 1)->count(), $students->where('understanding', 2)->count(), $students->where('understanding', 3)->count()])
            ->setLabels(['Not Understood', 'Understood', 'Well Understood'])
            ->setColors(['#2a9d8f', '#ef476f', '#0077b6']);

        $material_available = new PieChart();
        $material_available->setTitle('6. Availability of Materials')
            ->addData([$students->where('material_available', 1)->count(), $students->where('material_available', 2)->count()])
            ->setLabels(['Not Available', 'Available'])
            ->setColors(['#ffc63b', '#2a9d8f']);

        $data = [
            'class_test' => $class_test,
            'assignment' => $assignment,
            'corrections' => $corrections,
            'test_returned' => $tests_returned,
            'understanding' => $understanding,
            'material_available' => $material_available,
        ];

        return view('hod.evaluations.show', compact('course', 'data', 'studentEv'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
