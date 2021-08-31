<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SummaryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'required_without:document',
            'document' => 'required_without:notes|mimes:pdf,docx',
        ]);


        $course = Course::find($request->course_id);
        $academic_year = session()->get('academic_year');

        $summary = new Summary();
        $summary->notes = $request->notes;
        $summary->course_id = $request->course_id;
        $summary->lecturer_id = $request->lecturer_id;
        $summary->academic_year = $academic_year;

        if ($request->hasFile('document')){
            $file = $request->file('document');
            $filename = str_replace(' ', '.', $course->ante).'-Course-Summary-' . str_replace('/', '.', $academic_year) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('summaries'), $filename);
            $summary->document = $filename;
        }

        $summary->save();

        return redirect()->route('lecturer.courses.show', $course)->with('success', 'Course summary updated successfully');

    }

    public function download(Summary $summary)
    {
        $filePath = public_path()."/summaries/".$summary->document;

        $headers = ['Content-Type: application/pdf'];

        $fileName = $summary->document;

        return response()->download($filePath, $fileName, $headers);
    }

    public function edit(Summary $summary)
    {
        $lecturer = auth()->user()->lecturer;

        $course = $summary->course;

        return view('lecturer.summaries.edit', compact('course', 'lecturer', 'summary'));
    }


    public function update(Request $request, Summary $summary)
    {
        $request->validate([
            'notes' => 'required_without:document',
            'document' => 'required_without:notes|mimes:pdf,docx',
        ]);

        $summary->notes = $request->notes;

        if ($request->hasFile('document')){
            $file = $request->file('document');
            $filename = str_replace(' ', '.', $summary->course->ante).'-Course-Summary-' . str_replace('/', '.', $summary->academic_year) . '.' . $file->getClientOriginalExtension();
                if ($summary->document){
                    File::delete(public_path('summaries') . $summary->document);
                }
            $file->move(public_path('summaries'), $filename);
            $summary->document = $filename;
        }

        $summary->save();

        return redirect()->route('lecturer.courses.show', $summary->course)->with('success', 'Course summary updated successfully');

    }

    public function destroy(Summary $summary)
    {
        $course = $summary->course;

        if ($summary->document){
            File::delete(public_path('summaries') . $summary->document);
        }

        $summary->delete();

        return redirect()->route('lecturer.courses.show', $course)->with('success', 'Course summary deleted successfully');

    }
}
