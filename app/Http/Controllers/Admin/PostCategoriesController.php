<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
	public function index()
	{
		$categories = PostCategory::all();
		return view('admin.postCategories.index', [
				'categories' => $categories
		]);
	}

	public function create()
	{
    	return view('admin.postCategories.create');
	}

	public function store(Request $request){

		$this->validate($request, [
			'title' => 'required',
			'image' => 'nullable|image'
		]);
		$category = PostCategory::add($request->all());
		$category->uploadImage($request->file('image'));
		return redirect()->route('post-categories.index');
	}

	public function edit($id){
		$category = PostCategory::find($id);
		return view('admin/postCategories/edit', [
				'category' => $category
		]);
	}

	public function update(Request $request, $id){
		$this->validate($request, [
				'title' => 'required',
				'image' => 'nullable|image'
		]);
		$category = PostCategory::find($id);

		$category->update($request->all());
		$category->uploadImage($request->file('image'));

		return redirect()->route('post-categories.index');
	}

	public function destroy($id){
		PostCategory::find($id)->remove();
		return redirect()->route('post-categories.index');
	}
}
