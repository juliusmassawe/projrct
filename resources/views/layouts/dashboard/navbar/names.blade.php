@if(auth()->user()->role_id == 1)
    Admin
@elseif(auth()->user()->role_id == 2)
    <small>{{auth()->user()->student->first_name . " ". auth()->user()->student->last_name}}</small>
@elseif(auth()->user()->role_id == 3)
    <small>
        @if(auth()->user()->lecturer->level_id == 6)
            <i>Dr. </i>
        @else
            @if(auth()->user()->lecturer->gender == "F")
                <i>Ms. </i>
            @else
                <i>Mr. </i>
            @endif
        @endif
        {{auth()->user()->lecturer->first_name . " ". auth()->user()->lecturer->last_name}}
    </small>
@elseif(auth()->user()->role_id == 4)
    <small>{{auth()->user()->head_of_department->fullname}}</small>
@elseif(auth()->user()->role_id == 5)
    DVC-A
@elseif(auth()->user()->role_id == 6)
    QA
@endif

