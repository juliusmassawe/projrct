@extends('layouts.main')

@section('page-title')
    Dashboard
@endsection

@section('content')
<h1 class="app-page-title text-success"><span class="nav-icon"><i class="fa fa-home"></i></span> Dashboard</h1>
    <h1>Welcome DVC-A</h1>
    <p>Date: {{date(' m Y')}}</p>
@endsection
