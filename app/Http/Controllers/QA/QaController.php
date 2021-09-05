<?php

namespace App\Http\Controllers\QA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QaController extends Controller
{
    public function index()
    {
        return view('qa.index');
    }
}
