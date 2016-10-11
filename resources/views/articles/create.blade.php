@extends('layouts.master')

@section('title', 'Create new article')

@section('content')
{!! Form::open([
    'route' => 'articles.store',
    'files' => true,
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Image') !!}
    {!! Form::file('image') !!}
</div>

{!! Form::submit('Create Article', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
