@extends('layouts.main')

@section('page-title')
    {{$programme->abbreviation}} - Evaluations
@endsection

@section('content')
	<hr class="mb-4">
	<div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>{{$programme->name}}</h3>
                    <p class="">
                        Academic Year: <span class="badge badge-info">{{$academic_year}}</span>
                        Semester: <span class="badge badge-success">{{$semester}}</span>
                    </p>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="card card-body">
                <table class="table table-hover table-responsive-sm table-bordered mt-2 table-sm text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ante</th>
                        <th scope="col">Course name</th>
                        <th scope="col">Credits</th>
                        <th scope="col">Nature</th>
                        <th scope="col">Lecturer Ev</th>
                        <th scope="col">Students Ev</th>
                        <th scope="col">Summary</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr class="mt-2">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$course->ante}}</td>
                                <td class="text-left">{{$course->name}}</td>
                                <td>{{$course->credits}}</td>
                                <td><span class="badge @if($course->nature == "Core") badge-primary @else badge-success @endif">{{$course->nature}}</span></td>
                                <td>
                                    @if($lecturerEv[$course->id] >= 1)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger "></i>
                                    @endif
                                </td>
                                <td>
                                     <div class="progress">
                                        <div  class="progress-bar @if($studentEv[$course->id] <= 30) bg-danger @elseif($studentEv[$course->id] > 30 && $studentEv[$course->id] <= 60) bg-warning @elseif($studentEv[$course->id] > 60 && $studentEv[$course->id] <= 80) bg-info @else bg-success @endif"  style="width: {{$studentEv[$course->id]}}%" aria-valuenow="{{$studentEv[$course->id]}}" aria-valuemin="0" aria-valuemax="100">
                                            {{$studentEv[$course->id]}}%
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center ">
                                    <a href="{{route('hod.evaluations.show', $course->id)}}" class="btn btn-outline-info btn-sm">View</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="font-weight-bold text-center">
                                <td colspan="3">Total credits</td>
                                <td>
                                    <p>{{$courses->sum('credits')}}</p>
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                </table>

            </div>
        </div>

	<hr class="my-4">
@endsection


