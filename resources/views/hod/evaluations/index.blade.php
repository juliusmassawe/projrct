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
                    <h3>Course Evaluations</h3>
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

	<hr class="my-4">
@endsection

@section('scripts')
{{--    <script src="{{ $chart->cdn() }}"></script>--}}

{{--    {{ $chart->script() }}--}}
@endsection
