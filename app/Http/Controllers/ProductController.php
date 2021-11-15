<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {

		return view('products.index')->with([
			'products' => Product::all(),
		]);
	}

	public function create() {
		return view('products.create');
	}

	public function store(ProductRequest $request) {
		// session()->forget('error');

		/*$product = Product::create([
		'title' => request()->title,
		'description' => request()->description,
		'price' => request()->price,
		'stock' => request()->stock,
		'status' => request()->status,
		]);*/

		$product = Product::create($request->validated());
		// session()->flash('success', "The new product with id {$product->id} was created");

		// return redirect()->back();
		// return redirect()->action('MainController@index');
		return redirect()
			->route('products.index')
			->withSuccess("The new product with id {$product->id} was created");
	}

	public function show(Product $product) {
		// $product = Product::findOrFail($product);

		return view('products.show')->with([
			'product' => $product,
		]);
	}

	public function edit(Product $product) {

		return view('products.edit')->with([
			'product' => $product,
		]);
	}

	public function update(ProductRequest $request, Product $product) {
		// $product = Product::findOrFail($product);

		$product->update($request->validated());

		return redirect()
			->route('products.index')
			->withSuccess("The product with id {$product->id} was edited");
	}

	public function destroy(Product $product) {
		// $product = Product::findOrFail($product);

		$product->delete();

		return redirect()
			->route('products.index')
			->withSuccess("The product with id {$product->id} was deleted");
	}
}
