@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>

    @empty ($products)
        <div class="alert alert-danger" role="alert">
            No products yet!
        </div>
    @else
        <div class="row">
            {{-- @dump($products) --}}

            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-lg-3">
                    @include('components.product-card')
                </div>
            @endforeach

            {{-- @dump($products) --}}

            {{-- @dd(\DB::getQueryLog()) --}}
        </div>
    @endempty
@endsection