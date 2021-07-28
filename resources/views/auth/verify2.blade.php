@extends('layouts.auth.main')

@section('auth-title')
    Forgot Password
@endsection

@section('content')

    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="login100-form-title">
             Login
        </span>


        <div class="text-center p-t-136">
            <a class="txt2" href="#">
                S
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>

    </form>


@endsection
