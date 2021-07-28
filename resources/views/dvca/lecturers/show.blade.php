@extends('layouts.main')

@section('page-title')
    Manage course
@endsection

@section('content')
    <div class="col-md-12 ">
    <h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-school"></i></span> Manage course</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-3">
            <div class="app-card app-card-settings shadow-sm p-4">
                <h5 class="mb-4">Course Details</h5>
                <div class="app-card-body">
                    <p>Name: <span class="text-success font-weight-bold">{{$course->name}}</span></p>
                    <p>Ante: <span class="text-success font-weight-bold">{{$course->ante}}</span></p>
                    <p>Nature: <span class="text-success font-weight-bold">{{$course->nature}}</span></p>
                    <p>Credits: <span class="text-success font-weight-bold">{{$course->credits}}</span></p>

                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
        <div class="col-12 col-md-5">
            <div class="app-card app-card-settings shadow-sm p-4">
                <h5>Programmes with the course</h5>
                <div class="app-card-body">
                    <table id="myTable" class="table app-table-hover mb-0 text-left text-center">
                        <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Programme</th>
                            <th class="cell">Semester</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($course->programmes as $programme)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$programme->abbreviation}}</td>
                                    <td>{{$programme->pivot->semester}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No programmes with the course yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
        <div class="col-12 col-md-4">
            <div class="app-card app-card-settings shadow-sm p-4">
                <h5 class="mb-4">Add this course to a programme</h5>
                <div class="app-card-body">
                    <form action="{{route('add.course.to.programme')}}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <div class="form-group mb-3">
                            <label for="">Select a programme</label>
                            <select name="programme_id" id="programme_id" class="form-control my-2">
                                <option disabled selected>Choose...</option>
                                @forelse($programmes as $programme)
                                    <option value="{{$programme->id}}" @if(old('programme_id') == $programme->id) selected @endif>{{$programme->abbreviation}}</option>
                                @empty
                                    <option disabled>No programmes in your department yet!</option>
                                @endforelse
                            </select>
                            @error('programme_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="">This course will be in semester:</label>
                            <input type="number" class="form-control @error(old('semester')) is-invalid @enderror" value="{{old('semester')}}" name="semester" id="semester">
                            @error('semester')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Add Course</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <hr class="my-4">
    </div>
@endsection
