@extends('layouts.main')

@section('title', 'Show products')

@section('content')

<h1> Register </h1>

<form method="POST" action="{{ url('register') }}">
    @csrf

    <div>
        <label for="first_name">First Name: </label>
        <input
        type="text"
        name="first_name"
        placeholder="Type your first name..."
        value="{{ old('first_name') }}"
        required>
    </div>

    <div>
        <label for="last_name">Last Name: </label>
        <input
        type="text"
        name="last_name"
        placeholder="Type your last name..."
        value="{{ old('last_name') }}"
        required>
    </div>

    <div>
        <label for="email">Email: </label>
        <input
        type="email"
        name="email"
        placeholder="Type your email..."
        value="{{ old('email') }}"
        required>

        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>

@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

@endsection
