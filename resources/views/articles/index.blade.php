@extends('layouts.master')

@section('title', 'All Articles')

@section('content')
  <h1>All Articles</h1>
  <div id="articles">
    @foreach ($articles as $article)
      <div class="article">
        <h2 class="title">{{ $article->title }}:</h2> {{ substr($article->content, 0, 100) }}&hellip;
        <p class="article-link">{{ HTML::link_to_route('articles.show', 'Read more &raquo;', array($article->id) }}</p>
      </div>
    @endforeach
  </div>
@endsection
