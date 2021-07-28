@extends('layouts.auth.main')

@section('auth-title')
    Login
@endsection

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="login100-form-title">
             Login
        </span>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Login
            </button>
        </div>

        <div class="text-center p-t-12">
            <span class="txt1">
                Forgot Password?
            </span>
            @if (Route::has('password.request'))
                <a class="txt2" href="{{ route('password.request') }}">
                    Reset
                </a>
            @endif
        </div>

    </form>


@endsection
