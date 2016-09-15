@extends('layouts.master')

@section('title', 'Edit your profile')

@section('content')
{{ Form::model($user, array('route' => array('profile.update', $user->id), 'method' => 'PUT')) }}

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
@endif

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif

<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
@if ($errors->has('password'))
    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif

{!! Form::submit('Accept', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
