<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

    //DVC-A Routes
    Route::group(['prefix' => 'dvca/', 'as' =>'dvca.' , 'middleware' => 'role:5'], function(){
        Route::resource('dashboard', \App\Http\Controllers\DVCA\DVCAController::class);
        Route::resource('schedule', \App\Http\Controllers\DVCA\ScheduleController::class);
    });

    //Head Of Department Routes
    Route::group(['prefix' => 'hod/', 'as' => 'hod.', 'middleware' => 'role:4'], function(){
        Route::resource('dashboard', \App\Http\Controllers\HOD\HODController::class);
        Route::resource('programmes', \App\Http\Controllers\HOD\ProgrammeController::class);
        Route::resource('lecturers', \App\Http\Controllers\HOD\LecturerController::class);
        Route::resource('students', \App\Http\Controllers\HOD\StudentController::class);
        Route::resource('courses', \App\Http\Controllers\HOD\CourseController::class);

        Route::resource('schedule', \App\Http\Controllers\CourseController::class);
        Route::resource('remarks', \App\Http\Controllers\HOD\RemarkController::class);

        //PDF routes

    });

    //Student Routes
    Route::group(['prefix' => 'student/', 'as' =>'student.', 'middleware' => 'role:2'], function(){
        Route::resource('dashboard', \App\Http\Controllers\Student\StudentController::class);
        Route::resource('courses', \App\Http\Controllers\Student\CourseController::class)->only('index', 'show');
        Route::resource('evaluations', \App\Http\Controllers\Student\StudentEvaluationController::class);
        Route::get('summary/download/{summary}/{slug}', [\App\Http\Controllers\Student\SummaryController::class, 'download'])->name('download.summary');

    });

    //Lecturer Routes
    Route::group(['prefix' => 'lecturer/', 'as' =>'lecturer.', 'middleware' => 'role:3'], function(){
        Route::resource('dashboard', \App\Http\Controllers\Lecturer\LecturerController::class);
        Route::resource('courses', \App\Http\Controllers\Lecturer\CourseController::class);
        Route::resource('evaluations', \App\Http\Controllers\Lecturer\LecturerEvaluationController::class);
        Route::get('summary/download/{summary}/{slug}', [\App\Http\Controllers\Lecturer\SummaryController::class, 'download'])->name('download.summary');
        Route::resource('summary', \App\Http\Controllers\Lecturer\SummaryController::class);
    });

    //Quality Assurance
    Route::group(['prefix' => 'qa/', 'as' =>'qa.', 'middleware' => 'role:6'], function(){
        Route::get('dashboard', [\App\Http\Controllers\QA\QaController::class, 'index'])->name('index');

    });

    Route::group(['middleware' => 'evaluationCheck'], function (){
        Route::get('evaluations/{programme}/{year}/view', [\App\Http\Controllers\HOD\EvaluationController::class, 'currentEvaluations'])->name('view.evaluation');
        Route::post('evaluations/search', [\App\Http\Controllers\HOD\EvaluationController::class, 'search'])->name('search.evaluation');
        Route::get('evaluations/{course}/{year}/print', [\App\Http\Controllers\HOD\EvaluationController::class, 'print'])->name('print.evaluation');
        Route::get('evaluations/{course}/{year}/download', [\App\Http\Controllers\HOD\EvaluationController::class, 'download'])->name('download.evaluation');
        Route::get('evaluations/pdf', [\App\Http\Controllers\HOD\PdfController::class, 'download'])->name('evaluation.pdf');

        Route::resource('evaluations', \App\Http\Controllers\HOD\EvaluationController::class);
    });

});

Route::get('test', [\App\Http\Controllers\HOD\PdfController::class, 'download']);

