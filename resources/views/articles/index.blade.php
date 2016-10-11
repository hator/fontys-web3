@extends('layouts.master')

@section('title', 'All Articles')

@section('content')
	<form action="{{ action('ArticlesController@search')}}">
		<input type="text" name="keyword">
		<input type="submit" value="Search">
	</form>
	<h1>All Articles</h1>
	<div id="articles">
	  	@include('articles.list', array('articles' => $articles))
	</div>
@endsection
