<div class="card mb-2" style="min-height: 33rem;">

	<div id="carousel{{ $product->id }}" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			@foreach ($product->images as $image)
				<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
					<img src="{{ asset($image->path) }}" alt="" class="d-block w-100 card-img-top" style="max-height: 20rem; min-height: 20rem;">
				</div>
			@endforeach
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
  		</button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
	</div>

	<div class="card-body">
		<h4 class="text-end"><strong>${{ $product->price }}</strong></h4>
		<h5 class="card-title">{{ $product->title }}</h5>
		<p class="card-text">{{ $product->description}}</p>
		<p class="card-text"><strong>{{ $product->stock}} left</strong></p>

		@if (isset($cart))
			<p class="card-text">{{ $product->pivot->quantity }} in your cart <strong>(${{ $product->total}})</strong></p>

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