@extends('layouts.master')

@section('content')
	<h1>Create a product</h1>

	<form action="{{ route('products.store') }}" method="post">
		@csrf

		<div>
			<label for="title">Title</label>
			<input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" required>
		</div>

		<div>
			<label for="description">Description</label>
			<input class="form-control" type="text" name="description" id="description" value="{{ old('description') }}" required>
		</div>

		<div>
			<label for="price">Price</label>
			<input class="form-control" type="number" name="price" id="price" min="1.00" step="0.01" value="{{ old('price') }}" required>
		</div>

		<div>
			<label for="stock">Stock</label>
			<input class="form-control" type="number" name="stock" id="stock" min="0" value="{{ old('stock') }}" required>
		</div>

		<div>
			<label for="status">Status</label>
			<select class="form-select" name="status" id="status" required>
				<option value="" disabled selected>Select...</option>
				<option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>
				<option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
			</select>
		</div>

		<div>
			<input class="btn btn-primary btn-lg" type="submit" value="Create Product">
		</div>
	</form>
@endsection