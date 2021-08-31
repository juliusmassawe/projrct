@extends('layouts.main')

@section('page-title')
    Course Details
@endsection

@section('content')
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">
                    <h3>{{$course->name}} </h3>
                    <hr>
                    <span>Ante: <span class="text-success font-weight-bold">{{$course->ante}}</span></span>
                    <span class="mx-3">Nature: <span class="text-success font-weight-bold">{{$course->nature}}</span></span>
                    <span>Credits: <span class="text-success font-weight-bold">{{$course->credits}}</span></span>
                    <hr>
                    <span>Programme: <span class="text-success font-weight-bold">{{$course->programme->abbreviation}}</span></span>
                    <span class="mx-3">Level: <span class="text-success font-weight-bold">{{$course->programme->level->name}}</span></span>
                    <span class="mx-3">Year: <span class="text-success font-weight-bold">{{$course->year}}</span></span>
                    <span>Semester: <span class="text-success font-weight-bold">{{$course->semester}}</span></span>
                    <hr>
                    Lecturer(s):
                    @forelse($course->lecturers()->get() as $lecturer)
                        <span class="mr-3">{{$loop->iteration.": ".$lecturer->first_name." ".$lecturer->last_name}}</span>
                    @empty
                        -
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row g-4 settings-section">

            <div class="col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <h4>
                        <a class="btn btn-primary w-100" data-toggle="collapse" href="#course-summary" >
                           Course Summary
                        </a>
                    </h4>

                    <div class="collapse multi-collapse" id="course-summary">
                        <div class="card card-body my-4">
                            @if($summary)
                                <h4 class="text-center mb-4">Summary or notes about this course:</h4>
                                @if($summary->notes)
                                    <p> {!! $summary->notes !!}</p>
                                @endif

                                @if($summary->document)
                                    <p><a href="{{route('student.download.summary', [$summary, \Illuminate\Support\Str::slug($course->ante . ' ' . $course->name)])}}" class="btn btn-sm btn-outline-success">Download Document</a></p>
                                @endif

                            @else
                            <p class="text-center">Information about the course posted by the Lecturer will appear here</p>
                            @endif
                        </div>
                    </div>
                    @if($course->taught == 1 && $summary)
                        @if(!$student->evaluation->where('course_id', $course->id)->first())
                            <h4>
                                <a class="btn btn-info w-100" data-toggle="collapse" href="#course-evaluation" >
                                    Evaluate this course
                                </a>
                            </h4>

                            <div class="collapse multi-collapse" id="course-evaluation">
                                <div class="card card-body my-4">
                                    <h5 class="mb-4 text-center">Please select the most correct answer for each of the following questions</h5>
                                    <form action="{{route('student.evaluations.store')}}" method="POST" class="ml-md-2" id="evaluation-form">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                        <input type="hidden" name="academic_year" value="{{session()->get('academic_year')}}">

                                        <table id="myTable" class="table app-table-hover mb-4 table-bordered text-left table-responsive-sm ">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="cell">#</th>
                                                <th class="cell">Criteria</th>
                                                <th class="cell">Evaluation</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="@error('class_test') bg-danger @enderror">
                                                <td>1</td>
                                                <td  class="text-left">
                                                    <label for="class_test">Class Tests: </label>
                                                </td>
                                                <td  class="text-left">
                                                    <div class="ml-3">
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="class_test" id="class_test" value="2" @if(old('class_test') == 2) checked @endif>
                                                            <label class="form-check-label">Done</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="class_test" id="class_test" value="1" @if(old('class_test') == 1) checked @endif>
                                                            <label class="form-check-label" >Not done</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('assignment') bg-danger @enderror">
                                                <td>2</td>
                                                <td>
                                                    <label for="assignment">Assignment: </label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="assignment" id="assignment" value="2" @if(old('assignment') == 2) checked @endif>
                                                            <label class="form-check-label">Done</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="assignment" id="assignment" value="1" @if(old('assignment') == 1) checked @endif>
                                                            <label class="form-check-label" >Not done</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('correction') bg-danger @enderror">
                                                <td>3</td>
                                                <td>
                                                    <label for="correction">Correction: </label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="correction" id="correction" value="2" @if(old('correction') == 2) checked @endif>
                                                            <label class="form-check-label">Done</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="correction" id="correction" value="1" @if(old('correction') == 1) checked @endif>
                                                            <label class="form-check-label" >Not done</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('test_returned') bg-danger @enderror">
                                                <td>4</td>
                                                <td>
                                                    <label for="test_returned">Return of tests & Assignments: </label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="test_returned" id="test_returned" value="5" @if(old('test_returned') == 5) checked @endif>
                                                            <label class="form-check-label">Always</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="test_returned" id="test_returned" value="4" @if(old('test_returned') == 4) checked @endif>
                                                            <label class="form-check-label" >Frequently</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="test_returned" id="test_returned" value="3" @if(old('test_returned') == 3) checked @endif>
                                                            <label class="form-check-label" >Sometimes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="test_returned" id="test_returned" value="2" @if(old('test_returned') == 2) checked @endif>
                                                            <label class="form-check-label" >Rarely</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="test_returned" id="test_returned" value="1" @if(old('test_returned') == 1) checked @endif>
                                                            <label class="form-check-label" >Never</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('understanding') bg-danger @enderror">
                                                <td>5</td>
                                                <td>
                                                    <label for="understanding">Rate understanding level </label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="understanding" id="understanding" value="3" @if(old('understanding') == 3) checked @endif>
                                                            <label class="form-check-label">Well Understood</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="understanding" id="understanding" value="2" @if(old('understanding') == 2) checked @endif>
                                                            <label class="form-check-label">Understood</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="understanding" id="understanding" value="1" @if(old('understanding') == 1) checked @endif>
                                                            <label class="form-check-label" >Not Understood</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('material_available') bg-danger @enderror">
                                                <td>6</td>
                                                <td>
                                                    <label for="material_available">Availability of Material</label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">

                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="material_available" id="material_available" value="2" @if(old('material_available') == 2) checked @endif>
                                                            <label class="form-check-label">Available</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="material_available" id="material_available" value="1" @if(old('material_available') == 1) checked @endif>
                                                            <label class="form-check-label" >Not Available</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('well_organized') bg-danger @enderror">
                                                <td>7</td>
                                                <td>
                                                    <label for="well_organized">Course is organized in a manner that helped you in understanding the underlying concept</label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">

                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="well_organized" id="well_organized" value="2" @if(old('well_organized') == 2) checked @endif>
                                                            <label class="form-check-label">True</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="well_organized" id="well_organized" value="1" @if(old('well_organized') == 1) checked @endif>
                                                            <label class="form-check-label" >Not True</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('recommend') bg-danger @enderror">
                                                <td>8</td>
                                                <td>
                                                    <label for="recommend">Would you recommend this course to the coming students?</label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">

                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="recommend" id="recommend" value="2" @if(old('recommend') == 2) checked @endif>
                                                            <label class="form-check-label">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="recommend" id="recommend" value="1" @if(old('recommend') == 1) checked @endif>
                                                            <label class="form-check-label" >No</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('meet_expectations') bg-danger @enderror">
                                                <td>9</td>
                                                <td>
                                                    <label for="meet_expectations">Does the course meet expectations?</label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">

                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="meet_expectations" id="meet_expectations" value="2" @if(old('meet_expectations') == 2) checked @endif>
                                                            <label class="form-check-label">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="meet_expectations" id="meet_expectations" value="1" @if(old('meet_expectations') == 1) checked @endif>
                                                            <label class="form-check-label" >No</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="@error('helpful') bg-danger @enderror">
                                                <td>10</td>
                                                <td>
                                                    <label for="helpful">Course is helpful in progressing towards your study</label>
                                                </td>
                                                <td>
                                                    <div class="ml-3">

                                                        <div class="form-check form-check-inline mr-5">
                                                            <input class="form-check-input" type="radio" name="helpful" id="meet_expectations" value="2" @if(old('helpful') == 2) checked @endif>
                                                            <label class="form-check-label">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="helpful" id="meet_expectations" value="1" @if(old('helpful') == 1) checked @endif>
                                                            <label class="form-check-label" >No</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <a class="btn btn-success w-100 my-3 text-white" data-toggle="modal" data-target="#submitEvaluationModal">Submit Evaluation</a>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endif

                </div><!--//app-card-->
            </div>
        </div><!--//row-->

	<hr class="my-4">
        <div class="modal fade" id="submitEvaluationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to submit this evaluation? Note that you wont be able to edit this after submission.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a onclick="event.preventDefault(); document.getElementById('evaluation-form').submit();" class="btn btn-primary text-white">Submit</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
