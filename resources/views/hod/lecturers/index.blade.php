@extends('layouts.main')

@section('page-title')
    Lecturers
@endsection

@section('content')
	<hr class="mb-4">
	<div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>Department of {{auth()->user()->head_of_department->department->fullname}}</h3>
                    <p>Lecturers under this department</p>
                </div>
            </div>
        </div>

		<div class="col-12 col-md-12">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">
					<form class="settings-form">
						<div class="mb-3">
							<table id="myTable" class="table app-table-hover mb-0 table-responsive-sm text-center">
							<thead>
								<tr>
									<th class="cell">#</th>
									<th class="cell">Name</th>
									<th class="cell">Level</th>
                                    <th class="cell">Gender</th>
                                    <th class="cell">Since</th>
									<th class="cell">Worker ID</th>
									<th class="cell">Manage</th>
								</tr>
							</thead>
							<tbody>
                            @forelse($lecturers as $lecturer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$lecturer->first_name . " " . $lecturer->last_name}}</td>
                                    <td>{{$lecturer->level->name}}</td>
                                    <td>{{$lecturer->gender}}</td>
                                    <td>{{$lecturer->employ_year}}</td>
                                    <td>{{$lecturer->work_id}}</td>
                                    <td>
                                        <a href="{{route('hod.lecturers.edit', $lecturer)}}" class="btn btn-outline-info btn-sm">Manage</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Lecturers under this department yet</td>
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
