<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        request()->session()->put('academic_year', $this->current_academic_year());

        if (auth()->user()->role->id == 4){
            return $this->redirectTo =route('hod.dashboard.index');
        }
        elseif (auth()->user()->role->id == 5){
            return $this->redirectTo = route('dvca.dashboard.index');
        }
        elseif (auth()->user()->role->id == 2){
            return $this->redirectTo = route('student.dashboard.index');
        }
        elseif (auth()->user()->role->id == 3){
            return $this->redirectTo = route('lecturer.dashboard.index');
        }

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
