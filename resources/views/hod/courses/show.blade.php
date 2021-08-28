@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('page-title')
    Manage course
@endsection

@section('content')
    <div class="col-md-12 ">
    <h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-school"></i></span> Manage course</h1>
    <hr class="mb-4">
    <div class="d-flex justify-content-end">
        <a href="{{route('hod.courses.edit', $course->id)}}" class="btn btn-primary mb-2 ">Edit</a>
        <a data-toggle="modal" data-target="#deleteCourseModal" class="btn btn-danger text-white mb-2 ml-2">Delete</a>
    </div>
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
                <h5  class="mb-4">Programme details</h5>
                <div class="app-card-body">
                    <p>Programme: <span class="text-success font-weight-bold">{{$course->programme->abbreviation}}</span></p>
                    <p>Level: <span class="text-success font-weight-bold">{{$course->programme->level->name}}</span></p>
                    <p>Year: <span class="text-success font-weight-bold">{{$course->year}}</span></p>
                    <p>Semester: <span class="text-success font-weight-bold">{{$course->semester}}</span></p>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
        <div class="col-12 col-md-4">
            <div class="app-card app-card-settings shadow-sm p-4">
                <h5 class="mb-4">Lecturer(s) assigned to this course</h5>
                <div class="app-card-body">
                    @forelse($course->lecturers()->get() as $lecturer)
                        <ul>
                            <li>{{$lecturer->first_name." ".$lecturer->last_name}}</li>
                        </ul>
                    @empty
                        <form action="{{route('hod.courses.update', $course->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <div class="form-group mb-3">
                                <label for="">Select a lecturer</label>
                                <select name="lecturer_id[]" id="lecturer_id" class="form-control my-2 programme_id" multiple="multiple">
                                    @forelse($lecturers as $lecturer)
                                        <option value="{{$lecturer->id}}" @if(old('lecturer_id') == $lecturer->id) selected @endif>{{$loop->iteration.". ".$lecturer->first_name." ".$lecturer->last_name}}</option>
                                    @empty
                                        <option disabled>No lecturer in your department yet!</option>
                                    @endforelse
                                </select>
                                @error('lecturer_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn app-btn-primary w-100">Save</button>
                        </form>
                    @endforelse
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <hr class="my-4">
    </div>
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete this course?. This action is irreversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-course-form').submit();">Delete</button>
                    <form id="delete-course-form" action="{{ route('hod.courses.destroy', $course->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.programme_id').select2();
        });
    </script>
@endsection
