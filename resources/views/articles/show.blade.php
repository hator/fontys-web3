@extends('layouts.master')

@section('title')
  Article {{ $article->id }}
@endsection

@section('content')
  <h1>Article {{ $article->id }}</h1>
  <ul>
    <li>Title: {{ $article->title }}</li>
    <li>Text: {{ $article->content }}</li>
    <li>Author: {{ $article->author }}</li>
  </ul>
@endsection
