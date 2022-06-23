@extends('layouts.main')

@section('title', 'Show products')

@section('content')

<div class="header">

    <button class="btn" ><a href="{{ url('products') }}">Home</a></button>

    <div>
        <form method="GET" action="{{ url('products') }}">
            <input
            type="text"
            name="search"
            placeholder="Look for your product"
            value="{{ request()->query('search') }}" >
        </form>

    </div>

    <div class="filter">
        <span class="sort">Filter By:</span>
        <div>
            <strong><a href="{{ URL::current() }}" class="sort-font">All</a></strong>
            <strong><a href="{{ URL::current()."?sort=price_asc" }}" class="sort-font">Low to High</a></strong>
            <strong><a href="{{ URL::current()."?sort=price_desc" }}" class="sort-font">High to Low</a></strong>
        </div>
    </div>

    @auth
        <strong>Welcome, {{ auth()->user()->first_name }} !</strong>

        <form method="POST" action="/logout">
            @csrf
            <button class="btn" type="subtmi">Log Out</button>
        </form>
    @else
        <button class="btn" ><a href="{{ url('register') }}">Register</a></button>
        <button class="btn" ><a href="{{ url('login') }}">Log In</a></button>
    @endauth

</div>

<h1 class="text-center"> Welcome Admin! </h1>

<form action="{{ url('admin/products') }}" method="POST">

    @csrf

    @if(!$errors->first('type'))
    <x-form.type.input type="text" name="type" id="type" class="" />
    @else
    <x-form.type.input type="text" name="type" id="type" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('title'))
    <x-form.type.input type="text" name="title" id="title" class="" />
    @else
    <x-form.type.input type="text" name="title" id="title" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('description'))
    <x-form.type.input type="text" name="description" id="description" class="form-control" />
    @else
    <x-form.type.input type="text" name="description" id="description" class="form-control is-invalid" />
    @endif

    @if(!$errors->first('unit_price'))
    <x-form.type.input type="number" step="any" name="unit_price" id="unit_price" class="form-control" />
    @else
    <x-form.type.input type="number" step="any" name="unit_price" id="unit_price" class="form-control is-invalid" />
    @endif

    <x-form.type.button type="submit" class="btn btn-primar" />

</form>

<x-error.error />

@endsection
