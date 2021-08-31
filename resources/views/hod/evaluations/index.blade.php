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
                    <h3>Current Evaluations</h3>
                    <p class="">Academic Year: <span class="badge badge-info">{{date('Y', strtotime('-1 year')) . '/' . date('Y')}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="row g-4 mb-4">
                @forelse($programmes as $programme)
                    <div class="col-md-4">
                        <div class="app-card app-card-stat shadow-sm h-100"><br>
                            <span class="nav-icon fa-2x">{{$programme->abbreviation}}</span>
                            <div class="app-card-body pb-5">
                                @for($i = 1 ; $i<=$programme->no_of_semesters/2;  $i++)
                                <a href="{{route('hod.view.evaluation', [$programme, $i])}}" class="badge badge-info p-2 mt-3 mr-2">Year: {{$i}}</a>
                                @endfor
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="app-card app-card-stat shadow-sm h-100"><br>
                          <p class="text-center">No Programmes yet</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <h3 class="text-center">Search Evaluations</h3>
                    <form action="{{route('hod.search.evaluation')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="programme">Programme:</label>
                                <select name="programme_id" id="" class="form-control">
                                    <option selected disabled>...</option>
                                    @forelse($programmes as $programme)
                                        <option value="{{$programme->id}}" {{old('programme_id') == $programme->id ? 'selected' : ' '}}>{{$programme->abbreviation}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Year: </label>
                                <input type="number" name="year" value="{{old('year')}}" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Semester</label>
                                <select name="semester" class="form-control">
                                    <option selected disabled>...</option>
                                    <option value="1" {{old('semester') == 1 ? 'selected' : ' '}}>1</option>
                                    <option value="2" {{old('semester') == 2 ? 'selected' : ' '}}>2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Academic Year: <small><i>(E.g 2021/2022)</i></small></label>
                                <input type="text" name="academic_year" value="{{old('academic_year')}}" class="form-control">
                            </div>
                            <div class="form-group col-md-2 ">
                                <label> Search </label>
                                <button class="btn btn-info w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

	<hr class="my-4">
@endsection

@section('scripts')
{{--    <script src="{{ $chart->cdn() }}"></script>--}}

{{--    {{ $chart->script() }}--}}
@endsection
