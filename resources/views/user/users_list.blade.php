@extends('layout')

@section('title','Theme Looks Test')

@section('content')



<h2 style="text-align: center">User's List</h2>
        @if(Session::has('msg'))
        <p class="alert alert-info" style="text-align: center">{{ Session::get('msg') }}</p>
        @endif

        @if(isset($users['0']))
        <table class="table">
            <thead>
                <tr>
                    <td>S.No</td>
                    <td>User Name</td>
                    <td>Email Address</td>
                    <td>Date of Birth</td>
                    <td>Country</td>
                    <td>City</td>
                    <td>Status</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($users as $user)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ ucfirst($user->status) }}</td>
                <td>
                    <a href="{{ url('register/edit_form/'.$user->id) }}"</a><button class="btn btn-info">Edit</button></a>
                    <a href="{{ url('register/user/delete/'.$user->id) }}"</a><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        @else
            <h3 style="text-align: center">Sorry!No users Found...</h3>
        @endif
    </tbody>
</table>
@endsection
