<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::all();
		return view('admin/products/index', [
				'products' => $products,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Product::deleteTempImages();
		$categories = ProductCategory::pluck('title', 'id');
		return view('admin/products/create', [
				'categories' => $categories
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
			'image' => 'required|image'
		]);

		$product = Product::add($request->all());
		$product->uploadImage($request->file('image'));
		$product->setCategory($request->get('category_id'));

		return redirect()->route('products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		Product::deleteTempImages();
		$product = Product::find($id);
		$categories = ProductCategory::pluck('title', 'id');
		$product_images = ProductImage::where('product_id', $id)->get();
		return view('admin/products/edit', [
				'product' => $product,
				'categories' => $categories,
				'product_images' => $product_images
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
				'title' => 'required',
				'description' => 'required',
				'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
				'image' => 'nullable|image'
		]);

		$product = Product::find($id);
		$product->update($request->all());
		$product->moveFromTemp($id);
		$product->uploadImage($request->file('image'));
		$product->setCategory($request->get('category_id'));

		return redirect()->route('products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Product::find($id)->remove();
		return redirect()->route('products.index');
	}
}
