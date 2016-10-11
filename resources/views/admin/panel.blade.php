@extends('layouts.master')

@section('title', 'Admin panel')

@section('content')
  <h1>All articles</h1>
  <div id="articles">
      @include('admin.listarticles', array('users' => $users))
  </div>
  <h1>All users</h1>
  <div id="articles">
      @include('admin.listusers', array('articles' => $articles))
  </div>
@endsection

