<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer\LecturerEvaluation;
use App\Models\Programme;
use App\Models\Student\StudentEvaluation;
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

    public function search(Request $request)
    {

        $request->validate([
            'programme_id' => 'required',
            'academic_year' => 'required',
            'year' => 'required|int|max:3|min:1',
            'semester' => 'required',
        ]);

        $programme = Programme::find($request->programme_id);

        if ($request->year > $programme->no_of_semesters/2){
            return back()->with('fail', 'Incorrect number of semesters');
        }

        $courses = $programme->courses->where('semester', $request->semester)->where('year', $request->year);
        $academic_year = $request->academic_year;

        return $this->view($courses, $academic_year, $programme);

    }

    public function currentEvaluations(Programme $programme, $year)
    {
        $courses =  $programme->courses->where('semester', $this->current_semester())->where('year', $year);
        $academic_year = session()->get('academic_year');

       return $this->view($courses, $academic_year, $programme);
    }

    public function view($courses, $academic_year, $programme)
    {

        $studentEv=[];
        $lecturerEv = [];

        foreach ($courses as $course) {
            $evaluations = $course->studentEvaluations->where('academic_year', $academic_year)->count();
            $students = $programme->students()->where('current_semester', $course->sem)->where('current_academic_year', $academic_year)->count();

            if ($students > 0){
                $studentEv[$course->id] = $evaluations/$students * 100;
            }
            else{
                $studentEv[$course->id] = 0;
            }

           $lecturerEv[$course->id] = $course->LecturerEvaluations->where('academic_year', $academic_year)->count();

        }

        $semester = $courses->first()->sem;

        return view('hod.evaluations.view', compact('courses', 'programme', 'studentEv', 'lecturerEv', 'academic_year', 'semester'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        $students =  $course->studentEvaluations->where('academic_year', session()->get('academic_year'));
        $lecturers =  $course->lecturerEvaluations->where('academic_year', session()->get('academic_year'))->first();

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
            ->setColors(['#f9627d', '#4de38e']);

        $assignment = new PieChart();
        $assignment->setTitle('2. If assignments were done')
            ->addData([$students->where('assignment', 1)->count(), $students->where('assignment', 2)->count()])
            ->setLabels(['Not Done', 'Done'])
            ->setColors(['#f9627d', '#4de38e']);

        $corrections = new PieChart();
        $corrections->setTitle('3. If corrections were done')
            ->addData([$students->where('correction', 1)->count(), $students->where('correction', 2)->count()])
            ->setLabels(['Not Done', 'Done'])
            ->setColors(['#f9627d', '#4de38e']);

        $tests_returned = new PieChart();
        $tests_returned->setTitle('4. If tests were returned')
            ->addData([$students->where('test_returned', 1)->count(), $students->where('test_returned', 2)->count(), $students->where('test_returned', 3)->count(), $students->where('test_returned', 4)->count(), $students->where('test_returned', 5)->count()])
            ->setLabels(['Never', 'Rarely', 'Sometimes', 'Frequently', 'Everytime'])
            ->setColors(['#f9627d', '#bde0fe', '#0077b6', '#ffdd00', '#4de38e']);

        $understanding = new PieChart();
        $understanding->setTitle('5. Understanding Level')
            ->addData([$students->where('understanding', 1)->count(), $students->where('understanding', 2)->count(), $students->where('understanding', 3)->count()])
            ->setLabels(['Not Understood', 'Understood', 'Well Understood'])
            ->setColors(['#f9627d', '#ffdd00', '#4de38e']);

        $material_available = new PieChart();
        $material_available->setTitle('6. Availability of Materials')
            ->addData([$students->where('material_available', 1)->count(), $students->where('material_available', 2)->count()])
            ->setLabels(['Not Available', 'Available'])
            ->setColors(['#f9627d', '#4de38e']);

        $well_organized = new PieChart();
        $well_organized->setTitle('7. If the course is well organized')
            ->addData([$students->where('well_organized', 1)->count(), $students->where('well_organized', 2)->count()])
            ->setLabels(['Not Organized', 'Organized'])
            ->setColors(['#f9627d', '#4de38e']);

        $recommend = new PieChart();
        $recommend->setTitle('8. Recommend the course to coming students')
            ->addData([$students->where('recommend', 1)->count(), $students->where('recommend', 2)->count()])
            ->setLabels(['No', 'Yes'])
            ->setColors(['#f9627d', '#4de38e']);

        $meet_expectations = new PieChart();
        $meet_expectations->setTitle('9. If the course meets expectations')
            ->addData([$students->where('meet_expectations', 1)->count(), $students->where('meet_expectations', 2)->count()])
            ->setLabels(['No', 'Yes'])
            ->setColors(['#f9627d', '#4de38e']);

        $helpful = new PieChart();
        $helpful->setTitle('10. Helpful in progressing towards study')
            ->addData([$students->where('helpful', 1)->count(), $students->where('helpful', 2)->count()])
            ->setLabels(['Not Helpful', 'Helpful'])
            ->setColors(['#f9627d', '#4de38e']);


        $data = [
            'class_test' => ['student' => $class_test, 'lecturer' => $this->lecturerAnswers($lecturers)['class_test']],
            'assignment' => ['student' => $assignment, 'lecturer' => $this->lecturerAnswers($lecturers)['assignment']],
            'corrections' => ['student' => $corrections, 'lecturer' => $this->lecturerAnswers($lecturers)['corrections']],
            'test_returned' => ['student' => $tests_returned, 'lecturer' => $this->lecturerAnswers($lecturers)['test_returned']],
            'understanding' => ['student' => $understanding, 'lecturer' => $this->lecturerAnswers($lecturers)['understanding']],
            'material_available' => ['student' => $material_available, 'lecturer' => $this->lecturerAnswers($lecturers)['material_available']],
            'well_organized' => ['student' => $well_organized, 'lecturer' => $this->lecturerAnswers($lecturers)['well_organized']],
            'recommend' => ['student' => $recommend, 'lecturer' => $this->lecturerAnswers($lecturers)['recommend']],
            'meet_expectations' => ['student' => $meet_expectations, 'lecturer' => $this->lecturerAnswers($lecturers)['meet_expectations']],
            'helpful' => ['student' => $helpful, 'lecturer' => $this->lecturerAnswers($lecturers)['helpful']],
        ];

        $test = ['one' => 1, 'two' => 2, 'three' => 8, 'two_again' => 2];

        $big = 0;
        foreach ($test as $key => $val) {
            if ($val > $big){
                $big = $val;
            }
        }

//        dd($big);
        $summary = $this->studentSummary($students);

        return view('hod.evaluations.show', compact('course', 'data', 'studentEv', 'summary'));
    }

    public function lecturerAnswers($lecturers)
    {

        if ($lecturers != null){
            if ($lecturers->class_test === 1){
                $class_test = "Not Done";
            }
            else{
                $class_test = "Done";
            }

            if ($lecturers->assignment === 1){
                $assignment = "Not Done";
            }
            else{
                $assignment = "Done";
            }

            if ($lecturers->corrections === 1){
                $corrections = "Not Done";
            }
            else{
                $corrections = "Done";
            }

            if ($lecturers->test_returned === 1){
                $test_returned = "Never";
            }
            elseif ($lecturers->test_returned === 2){
                $test_returned = "Rarely";
            }
            elseif ($lecturers->test_returned === 3){
                $test_returned = "Sometimes";
            }
            elseif ($lecturers->test_returned === 4){
                $test_returned = "Frequently";
            }
            else{
                $test_returned = "Always";
            }

            if ($lecturers->understanding === 1){
                $understanding = "Not Understood";
            }
            elseif ($lecturers->understanding === 1){
                $understanding = "Not Understood";
            }
            else{
                $understanding = "Understood";
            }

            if ($lecturers->material_available === 1){
                $material_available = "Not Available";
            }
            else{
                $material_available = "Available";
            }

            if ($lecturers->well_organized === 1){
                $well_organized = "Not Organized";
            }
            else{
                $well_organized = "Organized";
            }

            if ($lecturers->recommend === 1){
                $recommend = "No";
            }
            else{
                $recommend = "Yes";
            }

            if ($lecturers->meet_expectations === 1){
                $meet_expectations = "No";
            }
            else{
                $meet_expectations = "Yes";
            }

            if ($lecturers->helpful === 1){
                $helpful = "Not Helpful";
            }
            else{
                $helpful = "Helpful";
            }

            return $lecturer_answers = [
                'class_test' => $class_test,
                'assignment' => $assignment,
                'corrections' => $corrections,
                'test_returned' => $test_returned,
                'understanding' => $understanding,
                'material_available' => $material_available,
                'well_organized' => $well_organized,
                'recommend' => $recommend,
                'meet_expectations' => $meet_expectations,
                'helpful' => $helpful,
            ];
        }
        return $lecturer_answers = [
            'class_test' => "Unevaluated",
            'assignment' => "Unevaluated",
            'corrections' => "Unevaluated",
            'test_returned' => "Unevaluated",
            'understanding' => "Unevaluated",
            'material_available' => "Unevaluated",
            'well_organized' => "Unevaluated",
            'recommend' => "Unevaluated",
            'meet_expectations' => "Unevaluated",
            'helpful' => "Unevaluated",
        ];
    }

    public function studentSummary($students)
    {
        $ct_yes = $students->where('class_test', 2)->count();
        $ct_no = $students->where('class_test', 1)->count();
        $class_test = $ct_no > $ct_yes ? " No " : "Yes";

        $as_yes = $students->where('assignment', 2)->count();
        $as_no = $students->where('assignment', 1)->count();
        $assignment = $as_no > $as_yes ? " No " : "Yes";

        $co_yes = $students->where('class_test', 2)->count();
        $co_no = $students->where('class_test', 1)->count();
        $correction = $co_no > $co_yes ? " No " : "Yes";

        $array = [
          'tr_n' => $students->where('test_returned', 1)->count(),
          'tr_r' => $students->where('test_returned', 2)->count(),
          'tr_s' => $students->where('test_returned', 3)->count(),
          'tr_f' => $students->where('test_returned', 4)->count(),
          'tr_a' => $students->where('test_returned', 5)->count(),
        ];

        $maxval = 0;
        foreach ($array as $key => $val){
            if($val > $maxval){
                $maxval = $val;
            }
        }
        $test_returned = '';
        if($maxval === 1 ){
            $test_returned = "Never";
        }
        elseif ($maxval === 2 ){
            $test_returned = "Rarely";
        }
        elseif ($maxval === 3 ){
            $test_returned = "Sometimes";
        }
        elseif ($maxval === 4 ){
            $test_returned = "Frequently";
        }
        elseif ($maxval === 5 ){
            $test_returned = "Always";
        }

        $under_n = $students->where('test_returned', 1)->count();
        $tr_r = $students->where('test_returned', 2)->count();
        $tr_s = $students->where('test_returned', 3)->count();

        return [
            'class_test' => $class_test,
            'assignment' => $assignment,
            'correction' => $correction,
            'test_returned' => $test_returned,
        ];
        $ct_yes = $students->where('class_test', 2)->count();
        $ct_no = $students->where('class_test', 1)->count();
        $class_test = $ct_no > $ct_yes ? " No " : "Yes";
        dd($correction);
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
