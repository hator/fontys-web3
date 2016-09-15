@extends('layouts.master')

@section('title')
  {{ $article->title }} -- article #{{ $article->id }}
@endsection

@section('content')
  <div class="article">
    <h1>{{ $article->title }} <span class="article-id">#{{ $article->id }}</span></h1>
    <div class="article-author">{{ $article->author->name }}</div>
    <div class="article-content">{{ $article->content }}</div>
  </div>
  <a class="btn btn-warning" href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}">Edit/delete article</a>
@endsection
