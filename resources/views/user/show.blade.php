@extends('layouts.master')

@section('title', 'Your profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as user {{ $user->id }}
                    <ul>
                        <li>Name: <strong>{{ $user->name }}</strong></li>
                        <li>Email: <strong>{{ $user->email }}</strong></li>
                    </ul>
                </div>

                <a class="btn btn-warning" href="{{ action('ProfileController@edit', ['id' => $user->id]) }}">Edit your profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
