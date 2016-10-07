@extends('layouts.master')

@section('title')
  {{ $article->title }} -- article #{{ $article->id }}
@endsection

@section('content')
  <div class="article">
    <h1>{{ $article->title }} <span class="article-id">#{{ $article->id }}</span></h1>
    <h3 class="article-author">{{ $article->author->name }}</h3>
    @if ($article->image_path != "")
    	<img src="/{{$article->image_path}}" onmouseover="this.src='/{{$article->image_path}}.pixelated.jpg';" 
    	onmouseout="this.src='/{{$article->image_path}}';" />
    @endif
    <div class="article-content">{{ $article->content }}</div>
  </div>
  <a class="btn btn-info" href="{{ action('ArticlesController@download', ['id' => $article->id]) }}">Download as PDF</a>
  <a class="btn btn-warning" href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}">Edit/delete article</a>
@endsection
