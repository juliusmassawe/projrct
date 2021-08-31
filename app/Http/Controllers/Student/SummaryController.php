<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lecturer\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function download(Summary $summary)
    {
        $filePath = public_path()."/summaries/".$summary->document;

        $headers = ['Content-Type: application/pdf'];

        $fileName = $summary->document;

        return response()->download($filePath, $fileName, $headers);
    }
}
