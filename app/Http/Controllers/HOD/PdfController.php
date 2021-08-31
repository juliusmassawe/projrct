<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
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
        $data = User::with('role')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.evaluations', compact('data'));

        return $pdf;
    }
}
