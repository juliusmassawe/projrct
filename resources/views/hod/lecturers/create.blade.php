@extends('layouts.main')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="col-md-10 offset-md-3">
    <h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-school"></i></span> Add a course</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" action = "{{route('schedule.store')}}" method = "POST">
                        @csrf
                        <input type="hidden" name="department_id" value = "{{auth()->user()->head_of_department->department->id}}">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Course Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name = "name" id="name" value="{{old('name')}}" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Course Ante</label>
                            <input type="text" class="form-control @error('ante') is-invalid @enderror" name = "ante" id="ante" value="{{old('ante')}}" >
                            @error('ante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Department</label>
                            <input  class="form-control" value="{{auth()->user()->head_of_department->department->fullname}} ({{auth()->user()->head_of_department->department->abbreviation}})" disabled>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Course Nature</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nature" id="nature" value="Core"  @if(old('nature') == "Core") checked @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Core
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nature" id="nature" value="Elective" @if(old('nature') == "Elective") checked @endif>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Elective
                                        </label>
                                    </div>
                                    @error('nature')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Course Credits</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="credits" id="credits" value="2" @if(old('credits') == 2) checked @endif>
                                        <label class="form-check-label" for="exampleRadios2">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="credits" id="credits" value="1" @if(old('credits') == 1) checked @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            1
                                        </label>
                                    </div>
                                    @error('credits')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Course</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <hr class="my-4">
    </div>
@endsection
