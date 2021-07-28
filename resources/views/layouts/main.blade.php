<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('page-title') | Course Evaluation System</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('auth/images/mocu.svg')}}" type="image/x-icon">
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    @yield('styles')

</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
	        <div class="container-fluid py-2">
		        <div class="app-header-content">
		            <div class="row d-flex justify-content-between align-items-center">

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="https://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                            </a>
                        </div><!--//col-->

                        <div class="app-utilities col-auto">
                            <span class="d-none d-xl-inline" >Academic Year:</span> <span class="badge badge-info"> {{session()->get('academic_year')}}</span>
                        </div><!--//app-utilities-->

                        <div class="app-utilities col-auto">
                            <div class="app-utility-item app-user-dropdown dropdown">
                                @include('layouts.dashboard.navbar.names')
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                  @include('layouts.dashboard.navbar.profile_pic')
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li><a class="dropdown-item" href="account.html">Account</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Log Out</a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div><!--//app-user-dropdown-->
                        </div><!--//app-utilities-->
		            </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.html"><img src="{{asset('auth/images/mocu.svg')}}" width="50px"><span class="logo-text"> CES | {{auth()->user()->role->name}}</span></a>

		        </div><!--//app-branding-->
		        @include('layouts.dashboard.sidebar.index')
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
                @include('layouts.alerts')
                @yield('content')
            </div><!--//container-fluid-->
	    </div><!--//app-content-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/js/index-charts.js')}}"></script>

    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>

