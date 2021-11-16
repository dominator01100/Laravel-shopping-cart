@extends('layouts.app')

@section('content')
	<h1>Order Details</h1>

	<h4 class="text-center"><strong>Grand Total: </strong>${{ $cart->total }}</h4>

	<div class="text-center mb-3">
		<form action="{{ route('orders.store') }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success text-white">Confirm Order</button>
		</form>
	</div>


	<div class="table-responsive">
		<table class="table table-striped">
			<thead class="thead-light">
				<tr class="text-center">
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cart->products as $product)
				<tr>
					<td>
						<img src="{{ asset($product->images->first()->path) }}" alt="" class="img-fluid" style="width: 100px; height: 100px;">
						{{ $product->title }}
					</td>
					<td>${{ $product->price }}</td>
					<td>{{ $product->pivot->quantity }}</td>
					<td><strong>${{ $product->total }}</strong></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
