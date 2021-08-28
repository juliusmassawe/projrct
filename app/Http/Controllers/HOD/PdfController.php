<?php

namespace App\Http\Controllers\HOD;

use App\Classes\SMS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PdfController extends Controller
{
    public function download()
    {
        $phones = [
            0 => '255786065529',
            1 => '255620116322',
        ];


        $message = "Trying the new sms with custom class :)";

        $text = new SMS();

        $text->sendSingleSMS('255786065529', $message);
        $text->sendMultipleSMS($phones, $message);

        return 'success';
    }
}
