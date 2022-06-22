@extends('layouts.main')

@section('title', 'Show products')

@section('content')

<div class="header">

    <button class="btn" ><a href="{{ url('products') }}">Home</a></button>

</div>

<div>
    <h1>{{ $product['title'] }}</h1>
    <p>{{ $product['description'] }}</p>
    <h3>{{ $product['unit_price'] }} $ </h3>
</div>


@endsection
