<div class="card mb-2" style="min-height: 33rem;">
	<img src="{{ asset($product->images->first()->path) }}" alt="" class="card-img-top img-fluid" style="max-height: 20rem; min-height: 20rem;">

	<div class="card-body">
		<h4 class="text-end"><strong>${{ $product->price }}</strong></h4>
		<h5 class="card-title">{{ $product->title }}</h5>
		<p class="card-text">{{ $product->description}}</p>
		<p class="card-text"><strong>{{ $product->stock}} left</strong></p>

		@if (isset($cart))
			<form action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-warning">Remove from Cart</button>
			</form>

		@else
			<form action="{{ route('products.carts.store', ['product' => $product->id]) }}" method="post">
				@csrf
				<button type="submit" class="btn btn-success text-white">Add to Cart</button>
			</form>
		@endif
	</div>
</div>