@extends('layouts.master')

@section('content')
<!-- <div class="form-group">
  <label for="usr">Article title:</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="usr">Content:</label>
  <input type="text" class="form-control" id="usr">
</div>
<a class="btn btn-primary" href="{{ url('/login') }}">Add</a> -->
{!! Form::open([
    'route' => 'articles.store'
]) !!}

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
