@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="col-md-8 offset-md-2 ">
    <h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-school"></i></span> Add event</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" action = "{{route('dvca.schedule.store')}}" method = "POST">
                        @csrf
                        <div class="mb-3 ">
                            <label for="setting-input-2" class="form-label">Academic Year</label>
                            <input  class="form-control text-center" value="{{session()->get('academic_year')}}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Event</label>
                            <select class="form-control event @error('event') is-invalid @enderror" name = "event" id="event" >
                                <option disabled selected>Choose</option>
                                <option value="Semester">Semester</option>
                                <option value="1st Evaluation">1st Evaluation</option>
                                <option value="2nd Evaluation">2nd Evaluation</option>
                            </select>
                            @error('event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Level</label>
                            <select class="form-control levels @error('levels') is-invalid @enderror" name = "levels[]" id="levels" value="{{old('levels')}}" multiple="multiple" >
                                @forelse($levels as $level)
                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                @empty
                                    <option disabled>No level yet</option>
                                @endforelse
                            </select>
                            @error('levels')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Semester</label>

                            <div class="form-check ml-2">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="1" @if(old('semester') == 1) checked @endif>
                                <label class="form-check-label">
                                    1
                                </label>
                            </div>
                            <div class="form-check  ml-2">
                                <input class="form-check-input" type="radio" name="semester" id="semester" value="2" @if(old('semester') == 2) checked @endif>
                                <label class="form-check-label" >
                                    2
                                </label>
                            </div>

                            @error('semester')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="row">
                                <div class=" mb-3 col-md-6">
                                    <label for="setting-input-2" class="form-label">Start Date</label>
                                    <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{old('start_date')}}">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class=" mb-3 col-md-6">
                                    <label for="setting-input-2" class="form-label">End Date</label>
                                    <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{old('end_date')}}">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                        <button type="submit" class="btn app-btn-primary">Save Event</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <hr class="my-4">
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.levels').select2();
        });
    </script>
@endsection
