@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning" role="alert">
            Your cart is empty.
        </div>
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-12 col-sm-6 col-lg-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif
@endsection