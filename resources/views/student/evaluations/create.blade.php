@extends('layouts.main')

@section('page-title')
    Evaluate Course
@endsection

@section('content')
    <div class="col-md-10 offset-md-3">
    <h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-school"></i></span> Add Programme</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" action = "{{route('programmes.store')}}" method = "POST">
                        @csrf
                        <input type="hidden" name="department_id" value = "{{auth()->user()->head_of_department->department->id}}">

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Programme Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name = "name" id="name" value="{{old('name')}}" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Programme abbreviation</label>
                            <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name = "abbreviation" id="abbreviation" value="{{old('abbreviation')}}" >
                            @error('abbreviation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Department</label>
                            <input  class="form-control" value="{{auth()->user()->head_of_department->department->fullname}} ({{auth()->user()->head_of_department->department->abbreviation}})" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Level</label>
                            <select class="form-control @error('level_id') is-invalid @enderror" name = "level_id" id="level_id" >
                                <option selected disabled>Choose...</option>
                                @forelse($levels as $level)
                                    <option value="{{$level->id}}" @if(old('level') == $level->id) selected @endif>{{$level->name}}</option>
                                @empty
                                    <option select disabled>No departments yet</option>
                                @endforelse
                            </select>
                            @error('level_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Number of semesters</label>
                            <input type="number" class="form-control @error('no_of_semesters') is-invalid @enderror" name = "no_of_semesters" id="no_of_semesters" value="{{old('no_of_semesters')}}" >
                            @error('no_of_semesters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary" >Save</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <hr class="my-4">
    </div>
@endsection
