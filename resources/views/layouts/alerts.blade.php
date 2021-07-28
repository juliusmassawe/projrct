@if(session('success'))
    <div class="alert alert-success text-center" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('fail'))
    <div class="alert alert-danger text-center" role="alert">
        {{session('fail')}}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alerts  alert alert-danger alert-dismissible fade show" role="alert">
        <div class="many">
            <strong class="text-center">Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <br>
@endif
