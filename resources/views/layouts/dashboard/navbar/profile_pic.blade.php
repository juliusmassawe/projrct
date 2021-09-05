@if(auth()->user()->role_id == 1)
    <img src="{{asset('auth/images/avatars/default.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
@elseif(auth()->user()->role_id == 2)
    @if(auth()->user()->student->gender == "F")
        <img src="{{asset('auth/images/avatars/young_female.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
    @else
        <img src="{{asset('auth/images/avatars/young_male.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
    @endif
@elseif(auth()->user()->role_id == 3)
    @if(auth()->user()->lecturer->gender == "F")
        <img src="{{asset('auth/images/avatars/adult_female.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
    @else
        <img src="{{asset('auth/images/avatars/adult_male.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
    @endif
@elseif(auth()->user()->role_id == 4)
    <img src="{{asset('auth/images/avatars/default.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
@elseif(auth()->user()->role_id == 5)
    <img src="{{asset('auth/images/avatars/default.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
@elseif(auth()->user()->role_id == 6)
    <img src="{{asset('auth/images/avatars/default.svg')}}"  class="rounded-circle" alt="" srcset=""></a>
@endif
