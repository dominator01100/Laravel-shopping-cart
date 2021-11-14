@extends('layouts.app')

@section('content')
	<h1>Edit a product</h1>

	<form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
		@csrf
		@method('PUT')

		<div>
			<label for="title">Title</label>
			<input class="form-control" type="text" name="title" id="title" value="{{ old('title') ?? $product->title }}" required>
		</div>

		<div>
			<label for="description">Description</label>
			<input class="form-control" type="text" name="description" id="description" value="{{ old('description') ?? $product->description }}" required>
		</div>

		<div>
			<label for="price">Price</label>
			<input class="form-control" type="number" name="price" id="price" min="1.00" step="0.01" value="{{ old('price') ?? $product->price }}" required>
		</div>

		<div>
			<label for="stock">Stock</label>
			<input class="form-control" type="number" name="stock" id="stock" min="0" value="{{ old('stock') ?? $product->stock }}" required>
		</div>

		<div>
			<label for="status">Status</label>
			<select class="form-select" name="status" id="status" required>
				<option value="" disabled>Select...</option>
				<option value="available" {{ old('status') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }}>Available</option>
				<option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }}>Unavailable</option>
			</select>
		</div>

		<div>
			<input class="btn btn-primary text-white btn-lg mt-3" type="submit" value="Edit Product">
		</div>
	</form>
@endsection