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

    <button class="btn" ><a href="{{ URL::previous() }}">Filter</a></button>

</div>

<div class="products">
@foreach ($products as $product)

    <div class="product">
        <h1>{{ $product['title'] }}</h1>
        <p>{{ $product['description'] }}</p>
        <h3>Price: {{ $product['unit_price'] }}</h3>
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
{{ $products->appends(['search' => request()->query('search') ])->links() }}
</div>

@endsection
