@extends('layouts.master')

@section('title', 'Edit your profile')

@section('content')
{{ Form::model($user, array('route' => array('profile.update', $user->id), 'method' => 'PUT')) }}

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!--{{ Form::open(array('url' => 'user/' . $user->id, 'class' => 'pull-right')) }}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete this article', array('class' => 'btn btn-warning')) }}
{{ Form::close() }}-->

{!! Form::submit('Accept', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
