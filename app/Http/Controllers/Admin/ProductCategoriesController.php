<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use CKSource\CKFinder\Error;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin/productCategories/index', [
        		'categories' => $categories
				]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/productCategories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//				if(is_numeric($request->get('title'))){
//					$my_errors = ['В название должна быть хотя бы одно буква'];
//					return redirect()->route('product-categories.create')->with($my_errors);
//				}
        $this->validate($request, [
        		'title' => 'required|regex:/[^0-9]/',
						'image' => 'nullable|image'
				]);

        $category = ProductCategory::add($request->all());
        $category->uploadImage($request->file('image'));

        return redirect()->route('product-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('admin/productCategories/edit', [
        		'category' => $category
				]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$this->validate($request, [
					'title' => 'required',
					'image' => 'nullable|image'
			]);
			$category = ProductCategory::find($id);

			$category->update($request->all());
			$category->uploadImage($request->file('image'));

			return redirect()->route('product-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::find($id)->remove();
        return redirect()->route('product-categories.index');
    }
}
