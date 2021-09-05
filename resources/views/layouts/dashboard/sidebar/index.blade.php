
<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        @if(auth()->user()->role->name == "DVC-A")
            @include('layouts.dashboard.sidebar.dvca')
        @elseif(auth()->user()->role->name == "HOD")
            @include('layouts.dashboard.sidebar.hod')
        @elseif(auth()->user()->role->name == "Lecturer")
            @include('layouts.dashboard.sidebar.lecturer')
        @elseif(auth()->user()->role->name == "Student")
            @include('layouts.dashboard.sidebar.student')
        @elseif(auth()->user()->role->name == "QA")
            @include('layouts.dashboard.sidebar.qa')
        @endif
    </ul><!--//app-menu-->
</nav><!--//app-nav-->
