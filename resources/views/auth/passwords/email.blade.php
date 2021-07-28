@extends('layouts.auth.main')

@section('auth-title')
    Forgot Password
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <span class="login100-form-title">
             Forgot Password
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

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Send Password Reset Link
            </button>
        </div>

        <div class="text-center pt-5">
            <a class="txt2" href="{{route('login')}}">
                Login
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>

    </form>


@endsection
