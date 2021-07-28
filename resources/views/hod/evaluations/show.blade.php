@extends('layouts.main')

@section('page-title')
    Evaluation Details
@endsection

@section('content')
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>{{$course->name}} </h3>
                    <hr>
                    Lecturer(s):
                    @forelse($course->lecturers as $lecturer)
                        <span class="mr-3">{{$loop->iteration.": ".$lecturer->first_name." ".$lecturer->last_name}}</span>
                    @empty
                        -
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row g-4 mb-4">
            @if($studentEv == null)
             <div class="app-card app-card-settings shadow-sm ml-3">
                 <div class="app-card-body">
                     <h4 class="text-center py-5">No Evaluations Yet!</h4>
                 </div>
             </div>
            @else
                <span>Evaluation progress: </span>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar @if($studentEv <= 30) bg-danger @elseif($studentEv > 30 && $studentEv <= 60) bg-warning @elseif($studentEv > 60 && $studentEv <= 80) bg-info @else bg-success @endif progress-bar-animated" role="progressbar"  style="width: {{$studentEv}}%" aria-valuenow="{{$studentEv}}" aria-valuemin="0" aria-valuemax="100">
                        {{$studentEv}}%
                    </div>
                </div>

                <div class="row ">

                    @forelse($data as $chart)
                        <div class="col-md-4 mt-4">
                            <div class="app-card app-card-stat shadow-sm">
                                <div class="card-body">
                                    {!! $chart->container() !!}
                                </div>
                                <p class="text-left pb-3 pl-4"> Teacher's answer: </p>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            @endif
       </div>
   </div>

@endsection
@section('scripts')
    <script src="{{ $data['class_test']->cdn() }}"></script>
    @forelse($data as $chart)
        {{ $chart->script() }}
    @empty
    @endforelse

@endsection
