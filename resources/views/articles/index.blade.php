@extends('layouts.master')

@section('title', 'All Articles')

@section('content')
  <h1>All Articles</h1>
  <div id="articles">
      @include('articles.list', array('articles' => $articles))
  </div>
@endsection
