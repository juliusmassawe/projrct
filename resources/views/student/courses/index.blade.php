@extends('layouts.main')

@section('page-title')
    Courses
@endsection

@section('content')
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>{{auth()->user()->student->programme->abbreviation}} Semester: {{auth()->user()->student->current_semester}}</h3>
                    <p>Courses under this semester</p>
                </div>
            </div>
        </div>
	<div class="row g-4 settings-section">
		<div class="col-12 col-md-12">
			<div class="app-card app-card-settings shadow-sm p-4">
				<div class="app-card-body">
					<form class="settings-form">
						<div class="mb-3">
							<table id="myTable" class="table app-table-hover mb-0 table-bordered text-center table-responsive-sm">
							<thead>
								<tr>
									<th class="cell">#</th>
									<th class="cell">Name</th>
									<th class="cell">Ante</th>
                                    <th class="cell">Credits</th>
									<th class="cell">Evaluation</th>
									<th class="cell">Actions</th>
								</tr>
							</thead>
							<tbody>
                            <tr>
                                <td colspan="6" class="text-center font-weight-bold">{{$core_courses->first()->nature}} Courses</td>
                            </tr>
                                @forelse($core_courses as $course)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-left">{{$course->name}}</td>
                                        <td>{{$course->ante}}</td>
                                        <td>{{$course->credits}}</td>
                                        <td>

                                            @if($course->taught == 1)
                                                @if($student->evaluation->where('course_id', $course->id)->first())
                                                    <span class="badge badge-success">Evaluated</span>
                                                @else
                                                    <span class="badge badge-danger">Unevaluated</span>
                                                @endif
                                            @else
                                                <span class="badge badge-secondary">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('student.courses.show', $course)}}" class="btn btn-outline-info btn-sm">view</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            <tr>
                                <td colspan="6" class="text-center font-weight-bold">Electives</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="text-left">{{$elective->name}}</td>
                                <td>{{$elective->ante}}</td>
                                <td>{{$elective->credits}}</td>
                                <td>
                                    @if($student->evaluation->where('course_id', $elective->id)->first())
                                        <span class="badge badge-success">Evaluated</span>
                                    @else
                                        <span class="badge badge-danger">Unevaluated</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('student.courses.show', $elective->id)}}" class="btn btn-outline-info btn-sm">view</a>
                                </td>
                            </tr>
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
