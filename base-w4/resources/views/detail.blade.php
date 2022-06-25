@extends('layouts.main')

@section('title', 'Product Datails')

@section('content')

<div class="header">

    <button class="btn" ><a href="{{ url('products') }}">Home</a></button>

</div>

<div class="text-center">
    <h1>{{ $product['title'] }}</h1>
    <h2>{{ $product['id'] }}</h2>
    <p>{{ $product['description'] }}</p>
    <h3>{{ $product['unit_price'] }} $ </h3>
</div>


@endsection
