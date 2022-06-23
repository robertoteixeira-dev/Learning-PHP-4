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

<div class="products">
@foreach ($products as $product)

    <div class="product">
        <h1>{{ $product['title'] }}</h1>
        <h3>{{ $product['unit_price'] }} $ </h3>
        <h5>{{ $product['is_visible'] }}</h5>
        <a href="detail/{{ $product['id'] }}">See more about <strong>{{ $product['title'] }}</strong></a>
    </div>

@endforeach


@forelse($products as $product)

@empty
<p>
    No resuts found for query <strong>{{ request()->query('search')}}</strong>
    <button><a href="{{ URL::previous() }}">Go Back</a></button>
</p>

@endforelse

</div>

<div class="pagination">
    {{$products->links()}}
</div>

@endsection
