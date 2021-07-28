@extends('layouts.main')

@section('page-title')
    Programmes
@endsection

@section('content')
<h1 class="app-page-title"><span class="nav-icon"><i class="fa fa-folder"></i></span> Manage Programmes</h1>
	<hr class="mb-4">
	<div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>Faculty of {{auth()->user()->head_of_department->department->faculty}}</h3>
                    <p>Programmes under the department of {{auth()->user()->head_of_department->department->fullname}}</p>
                </div>
            </div>
        </div>
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
									<th class="cell">Abbreviation</th>
									<th class="cell">Level</th>
									<th class="cell"># of semesters</th>
									<th class="cell">Manage</th>

								</tr>
							</thead>
							<tbody>
								@forelse($programmes as $programme)
								<tr>
									<td class="cell">{{$loop->iteration}}</td>
									<td class="cell">{{substr($programme->name, 0, 20)}} ...</td>
									<td class="cell">{{$programme->abbreviation}}</td>
									<td class="cell">{{$programme->level->name}}</td>
									<td class="cell">{{$programme->no_of_semesters}}</td>
									<td>
                                        <a href="{{route('programmes.show', $programme)}}">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
										<a href="#" class="mx-2">
											<i class="fa fa-pen text-success"></i>
										</a>
										<a onclick="event.preventDefault(); document.getElementById('delete-programme-form').submit();">
											<i class="fa fa-trash text-danger"></i>
										</a>
                                        <form id="delete-programme-form" action="{{ route('programmes.destroy', $programme) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
									</td>
								</tr>
								@empty
									<tr>
										<td colspan = "8">No Programmes yet!</td>
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
