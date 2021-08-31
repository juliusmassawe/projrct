@extends('layouts.main')

@section('page-title')
    Edit Course Summary
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
                    <div>
                        <div class="card card-body my-4">
                            <form method="post" action="{{route('lecturer.summary.update', $summary)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <h4 class="text-center mb-4">Type the course summary or notes about this course</h4>

                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <input type="hidden" name="lecturer_id" value="{{$lecturer->id}}">

                                <div class="form-group">
                                    <textarea class="ckeditor form-control" name="notes">{{$summary->notes}}</textarea>
                                </div>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <hr>
                                <h4 class="text-center mb-4">Or upload pdf/word document containing the course summary</h4>
                                @if($summary->document)
                                    <h5 class="text-warning text-center mb-4">Warning! There is a document summary about this course already. Uploading the new one will replace the existing document.
                                       <small> <a href="{{route('lecturer.download.summary', [$summary, \Illuminate\Support\Str::slug($summary->course->ante . ' ' . $summary->course->name)])}}">View the existing document</a></small>
                                    </h5>
                                @endif
                                <div class="form-group d-flex justify-content-center">
                                    <input type="file" name="document"> <br>
                                    @error('document')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success text-center">Update summary</button>


                                    <a onclick="event.preventDefault(); document.getElementById('deleteSummaryForm').submit();" class="btn btn-danger ml-2 text-center">Delete summary</a>

                                </div>
                            </form>
                            <form action="{{ route('lecturer.summary.destroy', $summary) }}" id="deleteSummaryForm" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>

                </div><!--//app-card-->
            </div>
        </div><!--//row-->

        <hr class="my-4">

        @endsection

        @section('scripts')
            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.ckeditor').ckeditor();
                });
            </script>
@endsection
