@extends('layouts.master')

@section('content')
{{ Form::model($article, array('route' => array('articles.update', $article->id), 'method' => 'PUT')) }}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
