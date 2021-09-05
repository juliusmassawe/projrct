@extends('layouts.main')

@section('page-title')
    Dashboard
@endsection

@section('content')
<h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-home"></i></span> Dashboard</h1>
    <h1 class="mb-4">Welcome H.O.D</h1>

    <h3>Evaluation Progress</h3>
    <hr>
    <div class="row g-4 mb-4">
       @forelse($programmes as $programme)
            <div class="col-6 col-lg-4">
                <div class="app-card app-card-stat shadow-sm h-100"><br>
                    <span class="nav-icon"><i class="fa fa-book fa-5x text-{{array_rand(array_flip(['success', 'danger', 'warning', 'info', 'secondary', 'primary']))}}"></i></span>
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">{{$programme->abbreviation}}</h4>
                        @for($i = 1 ; $i<=$programme->no_of_semesters/2;  $i++)
                           <table class="table">
                               <thead>
                               <tr>Year {{$i}}</tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>{{$evaluations[$i][$i]->count()}}</td>
                               </tr>
                               </tbody>
                           </table>
{{--                            <a  class="badge badge-info p-2 mt-3 mr-2">Year {{$i}}</a>--}}
                        @endfor
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->

        @empty
        @endforelse
    </div>

@endsection
