<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::all();
		return view('admin/posts/index', [
				'posts' => $posts
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = PostCategory::pluck('title', 'id')->all();
		return view('admin/posts/create', [
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
				'content' => 'required',
				'image' => 'nullable|image'
		]);

		$post = Post::add($request->all());
		$post->uploadImage($request->file('image'));
		$post->setCategory($request->get('category_id'));

		return redirect()->route('posts.index');
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
		$categories = PostCategory::pluck('title', 'id')->all();
		$post = Post::find($id);
		return view('admin/posts/edit', [
				'post' => $post,
				'categories' => $categories
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
				'content' => 'required',
				'image' => 'nullable|image'
		]);
		$post = Post::find($id);
		$post->update($request->all());
		$post->uploadImage($request->file('image'));
		$post->setCategory($request->get('category_id'));

		return redirect()->route('posts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Post::find($id)->remove();
		return redirect()->route('posts.index');
	}
}
