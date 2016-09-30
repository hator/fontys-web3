@extends('layouts.master')

@section('title', 'Your profile')

@section('content')

<div class="panel-heading">Dashboard</div>
<div class="panel-body">
    You are logged in as user {{ url($user->name) }}
    <ul>
    	<li></li>
        <li>{{ Html::image($user->image_path,"", array('class' => 'img-circle')) }}</li>
        <li>Name: <strong>{{ $user->name }}</strong></li>
        <li>Email: <strong>{{ $user->email }}</strong></li>
    </ul>
</div>

<a class="btn btn-warning" href="{{ action('ProfileController@edit', ['id' => $user->id]) }}">Edit your profile</a>

<div class="articles">
    <h2>Your articles</h2>
    @include('articles.list', array('articles' => $articles))
</div>
@endsection
