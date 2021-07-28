@extends('layouts.main')

@section('page-title')
    Dashboard
@endsection

@section('content')
<h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-home"></i></span> Dashboard</h1>
    <h1>Welcome H.O.D</h1>
    <p>Date: {{date(' m Y')}}</p>
@endsection
