@extends('layouts.main')

@section('page-title')
    Courses
@endsection

@section('content')
<h1 class="app-page-title"><span class="nav-icon"><i class="fa fa-folder"></i></span> Manage courses</h1>
	<hr class="mb-4">
	<div class="row g-4 settings-section">
		<div class="col-12 col-md-12">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">
					<form class="settings-form">
						<div class="mb-3">
							<table id="myTable" class="table app-table-hover mb-0 text-left text-center">
							<thead>
								<tr>
									<th class="cell">#</th>
									<th class="cell">Name</th>
									<th class="cell">Ante</th>
                                    <th class="cell">Nature</th>
                                    <th class="cell">Credits</th>
									<th class="cell">Department</th>
									<th class="cell">Faculty</th>
									<th class="cell">Manage</th>

								</tr>
							</thead>
							<tbody>
								@forelse($courses as $course)
								<tr>
									<td class="cell">{{$loop->iteration}}</td>
									<td class="cell">{{$course->name}}</td>
									<td class="cell">{{$course->ante}}</td>
                                    <td class="cell">{{$course->nature}}</td>
                                    <td class="cell">{{$course->credits}}</td>
									<td class="cell">{{$course->department->abbreviation}}</td>
									<td class="cell">{{$course->department->faculty}}</td>
									<td>
										<a href="#">
											<i class="fa fa-pen text-info"></i>
										</a>
                                        <a href="{{route('schedule.show', $course)}}" class="mx-2">
                                            <i class="fa fa-plus text-success"></i>
                                        </a>
										<a onclick="event.preventDefault(); document.getElementById('delete-course-form').submit();">
											<i class="fa fa-trash text-danger"></i>
										</a>
                                        <form id="delete-course-form" action="{{ route('schedule.destroy', $course) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
									</td>
								</tr>
								@empty
									<tr>
										<td colspan = "8" class="text-center">No Courses yet!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
						</div>
					</form>
				</div><!--//app-card-body-->

			</div><!--//app-card-->
		</div>
	</div><!--//row-->

	<hr class="my-4">
@endsection
