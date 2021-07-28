<li class="nav-item">
    <a class="nav-link" href="{{route('dvca.dashboard.index')}}">
        <span class="nav-icon"><i class="fa fa-home"></i></span>
            <span class="nav-link-text">Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('dvca.schedule.index')}}">
        <span class="nav-icon"><i class="fa fa-school"></i></span>
        <span class="nav-link-text">Schedule</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
        <span class="nav-icon"><i class="fa fa-users"></i></span>
            <span class="nav-link-text">Programmes</span>
            <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span><!--//submenu-arrow-->
    </a><!--//nav-link-->
    <div id="submenu-2" class="collapse submenu submenu-2" data-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="add_student.html">Add Student</a></li>
            <li class="submenu-item"><a class="submenu-link" href="manage_student.html">Manage Student</a></li>
        </ul>
    </div>
</li><!--//nav-item-->

<li class="nav-item has-submenu">
    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
    <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon"><i class="fa fa-question"></i></span>
            <span class="nav-link-text">Questionaires</span>
            <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span><!--//submenu-arrow-->
    </a><!--//nav-link-->
    <div id="submenu-5" class="collapse submenu submenu-5" data-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="category.html">Manage Category</a></li>
            <li class="submenu-item"><a class="submenu-link" href="add_questionaire.html">Manage Questionaire</a></li>
        </ul>
    </div>
</li><!--//nav-item--><li class="nav-item">
    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
    <a class="nav-link" href="evaluation.html">
        <span class="nav-icon"><i class="fa fa-table"></i></span>
            <span class="nav-link-text">Evaluation</span>
    </a><!--//nav-link-->
</li><!--//nav-item-->
<li class="nav-item">
    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
    <a class="nav-link" href="comments.html">
        <span class="nav-icon"><i class="fa fa-comments"></i></span>
            <span class="nav-link-text">Comments</span>
    </a><!--//nav-link-->
</li><!--//nav-item-->
