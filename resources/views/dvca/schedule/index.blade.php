@extends('layouts.main')

@section('page-title')
    Schedule
@endsection

@section('content')
<h1 class="app-page-title"><span class="nav-icon"><i class="fa fa-folder"></i></span> Manage Schedule</h1>
	<hr class="mb-4">
	<div class="row g-4 settings-section">
		<div class="col-12 col-md-12">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">
                    <a href="{{route('dvca.schedule.create')}}" class="btn btn-success mb-4">Add an Event</a>
						<div class="mb-3">
							<table id="myTable" class="table app-table-hover mb-0 text-left text-center">
                                <thead>
                                    <tr>
                                        <th class="cell">Academic Year</th>
                                        <th class="cell">Event</th>
                                        <th class="cell">Level</th>
                                        <th class="cell">Semester</th>
                                        <th class="cell">Start Date</th>
                                        <th class="cell">End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                   <tr>
                                       <td>{{$event->year}}</td>
                                       <td>{{$event->event}}</td>
                                       <td>{{$event->level->name}}</td>
                                       <td>{{$event->semester}}</td>
                                       <td>{{date('d/m/Y', strtotime($event->start_date))}}</td>
                                       <td>{{date('d/m/Y', strtotime($event->end_date))}}</td>
                                   </tr>
                                    @empty
                                        <tr>
                                            <td colspan = "6" class="text-center">No Schedule yet!</td>
                                        </tr>
                                    @endforelse

                                </tbody>
						    </table>
						</div>
				</div><!--//app-card-body-->
			</div><!--//app-card-->
		</div>
	</div><!--//row-->

	<hr class="my-4">
@endsection
