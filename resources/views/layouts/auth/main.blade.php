<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('auth-title') | Course Evaluation System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('auth/images/mocu.svg')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('auth/images/mocu.svg')}}" alt="IMG">
            </div>
            <div class="header">
                <h3 class="font-weight-bold text-center">Course Evaluation System</h3>
                <hr>
                <div class="errors">
                    @include('layouts.alerts')
                </div>
                @yield('content')
                <hr>
            </div>

        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('auth/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('auth/js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
