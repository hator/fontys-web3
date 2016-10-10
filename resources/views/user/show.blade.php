@extends('layouts.master')

@section('title', 'Profile')

@section('content')

<div class="panel-heading">Dashboard</div>

<div class="panel-body">
    Profile name: {{ $user->name }}
    <ul>
    	@if ($user->image_path != "")
        <li>{{ Html::image($user->image_path) }}</li>
        @endif
        <li>Name: <strong>{{ $user->name }}</strong></li>
        <li>Email: <strong>{{ $user->email }}</strong></li>
    </ul>
</div>

<a class="btn btn-warning" href="{{ action('ProfileController@edit', ['id' => $user->id]) }}">Edit your profile</a>

<div class="articles">
    <h2>Profile's articles</h2>
    @include('articles.list', array('articles' => $articles))
</div>
@endsection
