@extends('layouts.main')

@section('page-title')
    View Programme
@endsection

@section('content')
    <h1 class="app-page-title"><span class="nav-icon"><i class="fa fa-folder"></i></span> Manage Programme: <span class="text-primary">{{$programme->abbreviation}}</span></h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>{{$programme->name}} ({{$programme->abbreviation}})</h3>
                    <hr>
                    <p>{{$programme->no_of_semesters/2 .ngettext(' Year', ' Years', $programme->no_of_semesters/2).' ('. $programme->no_of_semesters . ' Semesters) Programme'}}</p>

                    <hr>
                    Total Courses : <Span class="text-primary mr-3">{{$courses->count()}}</Span>
                    Core Courses : <Span class="text-primary mr-3">{{$courses->where('nature', 'Core')->count()}}</Span>
                    Elective Courses : <Span class="text-primary">{{$courses->where('nature', 'Elective')->count()}}</Span>
                    <hr>
                    Total students: <Span class="text-primary">{{$programme->students()->count()}}</Span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <h5 class="mt-2 text-center">Courses Distribution:</h5>

                @forelse($courses->groupBy('sem') as $course)
                        <h4>
                            <a class="btn btn-primary w-100" data-toggle="collapse" href="#year-{{$course->first()->sem}}" >
                                Semester {{$course->first()->sem}}
                            </a>
                        </h4>
                                <div class="col mb-4">
                                    <div class="collapse multi-collapse" id="year-{{$course->first()->sem}}">
                                        <div class="card card-body">
                                            <table class="table table-hover table-responsive-sm table-bordered mt-2 table-sm">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Course name</th>
                                                    <th scope="col">Ante</th>
                                                    <th scope="col">Credits</th>
                                                    <th scope="col">Nature</th>
                                                    <th scope="col">Lecturer</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                                </thead>

                                                    @foreach($course->groupBy('nature') as $cour)

                                                        @foreach($cour as $cou)
                                                        <tbody>
                                                                <tr class="mt-2">
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$cou->name}}</td>
                                                                    <td>{{$cou->ante}}</td>
                                                                    <td>{{$cou->credits}}</td>
                                                                    <td><span class="badge @if($cou->nature == "Core") badge-primary @else badge-success @endif">{{$cou->nature}}</span></td>
                                                                    <td>
                                                                        @if($cou->lecturers()->count() >= 1)
                                                                            <span class="badge badge-success">Assigned</span>
                                                                        @else
                                                                            <span class="badge badge-danger">Unassigned</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center ">
                                                                        <a href="{{route('hod.courses.show', $cou)}}" class="btn btn-outline-info btn-sm">Manage</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr class="font-weight-bold text-center">
                                                                <td colspan="3">Total credits</td>
                                                                <td>
                                                                    <p>{{$cour->sum('credits')}}</p>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>


                      @empty
                      @endforelse

                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">
    </div>
@endsection
