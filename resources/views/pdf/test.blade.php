@extends('layouts.pdf.main')

@section('title', 'All users')

@section('pdf-title', 'List of all users')

@section('content')
    <table>
        <thead class="table100-head">
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @empty
            <tr><td colspan="3">No Users</td></tr>
        @endforelse
        </tbody>
    </table>

@endsection
