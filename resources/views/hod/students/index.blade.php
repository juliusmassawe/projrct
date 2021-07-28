@extends('layouts.main')

@section('page-title')
    Students
@endsection

@section('content')
	<hr class="mb-4">
	<div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>Department of {{auth()->user()->head_of_department->department->fullname}}</h3>
                    <p>Students under this department</p>
                    <p class="">Academic Year: <span class="badge badge-info">{{date('Y', strtotime('-1 year')) . '/' . date('Y')}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    @forelse($students->groupBy('programme_id') as $student_by_programme)
                        <h4>
                            <a class="btn btn-primary w-100" data-toggle="collapse" href="#{{$student_by_programme->first()->programme->abbreviation}}" >
                                {{$student_by_programme->first()->programme->abbreviation}}
                            </a>
                        </h4>

                        <div class="col mb-4">
                            <div class="collapse multi-collapse" id="{{$student_by_programme->first()->programme->abbreviation}}">
                                <div class="card card-body">
                                    <table class="table table-hover table-responsive-sm table-bordered mt-2 text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Level</th>
                                            <th scope="col">Reg No</th>
                                            <th scope="col">Since</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($student_by_programme as $student)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$student->first_name . " " . $student->last_name}}</td>
                                                    <td>{{$student->programme->level->name}}</td>
                                                    <td>{{$student->student_id}}</td>
                                                    <td>{{$student->enroll_year}}</td>
                                                    <td>
                                                        <a href="{{route('hod.students.edit', $student)}}" class="btn btn-outline-info btn-sm">Manage</a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse

                </div>
            </div>
        </div>

	<hr class="my-4">
@endsection
