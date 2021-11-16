@extends('layouts.app')

@section('content')
	<h1>Payment Details</h1>

	<h4 class="text-center"><strong>Grand Total: </strong>${{ $order->total }}</h4>

	<div class="text-center mb-3">
		<form action="{{ route('orders.payments.store', ['order' => $order->id]) }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success text-white">Pay</button>
		</form>
	</div>
@endsection
