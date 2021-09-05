<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function print()
    {
        return $this->generatePdf()->stream();
    }

    public function download()
    {

        return $this->generatePdf()->download('evaluations.pdf');
    }

    public function generatePdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.evaluations');

        return $pdf;
    }
}
