@extends('layouts.master')

@section('title', 'Edit article #' . $article->id . ' ' . $article->title)

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
    {!! Form::submit('Accept', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

{{ Form::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) }}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete this article', array('class' => 'btn btn-warning')) }}
{{ Form::close() }}
@endsection
