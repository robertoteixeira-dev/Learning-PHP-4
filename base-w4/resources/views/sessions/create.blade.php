@extends('layouts.main')

@section('content')

<x-error.error />

<h1 class="text-center"> Log In! </h1>

<form action="{{ url('login') }}" method="POST">

    @csrf

    @if(!$errors->first('first_name'))
    <x-form.type.input type="text" name="first_name" id="first_name" class="" />
    @else
    <x-form.type.input type="text" name="first_name" id="first_name" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('last_name'))
    <x-form.type.input type="text" name="last_name" id="last_name" class="form-control" />
    @else
    <x-form.type.input type="text" name="last_name" id="last_name" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('email'))
    <x-form.type.input type="text" name="email" id="email" class="form-control" />
    @else
    <x-form.type.input type="text" name="email" id="email" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('Remember me'))
    <x-form.type.input type="checkbox" name="remember" id="remember" class="form-control" />
    @else
    <x-form.type.input type="checkbox" name="remember" id="remember" class="form-control is-invalid" />
    @endif

    <x-form.type.button type="submit" class="btn btn-primar" />

</form>

@endsection
