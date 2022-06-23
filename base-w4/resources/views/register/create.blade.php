@extends('layouts.main')

@section('content')

<x-error.error />

<h1 class="text-center"> Register </h1>

<form action="{{ url('register') }}" method="POST">

    @csrf

    @if(!$errors->first('first_name'))
    <x-form.type.input name="first_name" id="first_name" class="" />
    @else
    <x-form.type.input name="first_name" id="first_name" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('last_name'))
    <x-form.type.input name="last_name" id="last_name" class="form-control" />
    @else
    <x-form.type.input name="last_name" id="last_name" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('email'))
    <x-form.type.input name="email" id="email" class="form-control" />
    @else
    <x-form.type.input name="email" id="email" class="form-control is-invalid" />
    @endif

    <x-form.type.button type="submit" class="btn btn-primar" />

</form>

@endsection
