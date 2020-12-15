<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$partners = Partner::all();
		return view('admin/partners/index', [
				'partners' => $partners
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin/partners/create');
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
				'link' => 'required',
				'image' => 'required|image'
		]);
		$partner = Partner::add($request->all());
		$partner->uploadImage($request->file('image'));
		return redirect()->route('partners.index');
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
		$partner = Partner::find($id);
		return view('admin/partners/edit', [
				'partner' => $partner
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
				'link' => 'required',
				'image' => 'nullable|image'
		]);

		$partner = Partner::find($id);
		$partner->update($request->all());
		$partner->uploadImage($request->file('image'));

		return redirect()->route('partners.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Partner::find($id)->remove();
		return redirect()->route('partners.index');
	}
}
