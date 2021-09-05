@extends('layouts.pdf.main')

@section('title', 'Evaluations')

@section('pdf-title', 'Evaluation Results')

@section('content')
    <div class="details">
        <h3 style="text-align: center"> Department of {{$course->programme->department->fullname . " (". $course->programme->department->abbreviation . " )."}}</h3>
        <ul>
            <li>Couse Name: <span>{{$course->name}}</span></li>
            <li>Couse Ante: <span>{{$course->ante}}</span></li>
            <li>Couse Instructor: <span>{{$course->lecturers->first()->first_name . " " . $course->lecturers->first()->last_name}}</span> </li>
            <li>Academic Year: <span>{{session()->get('academic_year')}}</span> </li>
        </ul>
    </div>
    <table >
        <thead class="table100-head">
        <tr>
            <th>#</th>
            <th>Criteria</th>
            <th>Lecturer Answers</th>
            <th>Students Answers</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td class="text-left">If class tests were done</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['class_test']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['class_test']}}</b></span></td>
        </tr>

        <tr>
            <td>2</td>
            <td class="text-left">If class assignments were done</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['assignment']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['assignment']}}</b></span></td>
        </tr>

        <tr>
            <td>3</td>
            <td class="text-left">If corrections were made:</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['corrections']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['corrections']}}</b></span></td>
        </tr>

        <tr>
            <td>4</td>
            <td class="text-left">Frequency of tests & assignments return</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['test_returned']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['test_returned']}}</b></span></td>
        </tr>

        <tr>
            <td>5</td>
            <td class="text-left">Understanding level</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['understanding']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['understanding']}}</b></span></td>
        </tr>

        <tr>
            <td>6</td>
            <td class="text-left">Availability of Materials</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['material_available']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['material_available']}}</b></span></td>
        </tr>

        <tr>
            <td>7</td>
            <td class="text-left">Course is organized in a manner that helped students in understanding the underlying concept</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['well_organized']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['well_organized']}}</b></span></td>
        </tr>

        <tr>
            <td>8</td>
            <td class="text-left">Course is worth recommending to the coming students</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['recommend']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['recommend']}}</b></span></td>
        </tr>

        <tr>
            <td>9</td>
            <td class="text-left">Course meets expectations</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['meet_expectations']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['meet_expectations']}}</b></span></td>
        </tr>

        <tr>
            <td>10</td>
            <td class="text-left">Course is helpful in progressing towards student's study</td>
            <td><span class="text-secondary"><b>{{$lecturer_answers['helpful']}}</b></span></td>
            <td><span class="text-secondary"><b>{{$summary['helpful']}}</b></span></td>
        </tr>

        </tbody>
    </table>

    @if($course->remarks->count() > 0)
        <h4>Remarks</h4>
        <p>{{$course->remarks->first()->remarks}}</p>
    @endif
@endsection
