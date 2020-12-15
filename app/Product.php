<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
	use Sluggable;

	protected $fillable = ['title', 'description', 'price'];

	public function category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

	public function sluggable()
	{
		return [
				'slug' => [
						'source' => 'title'
				]
		];
	}

	public static function moveFromTemp($id){
		$dir = 'uploads/temp';
		$files = Storage::allFiles($dir);
		foreach ($files as $file) {
			$filename = uniqid() . basename($file);
			Storage::move($file, '/uploads/products/' . $filename);
			DB::table('product_images')->insert(
					['product_id' => $id, 'image' => $filename]
			);
		}
	}

	protected static function add($fields)
	{
		$product = new static();
		$product->fill($fields);
		$product->save();

		self::moveFromTemp($product->id);

		return $product;
	}


	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	public function remove()
	{
		$paths = ProductImage::where('product_id', $this->id)->get();
		foreach ($paths as $path) {
			Storage::delete('/uploads/products/' . $path->image);
		}
		Storage::delete('/uploads/products/' . $this->image);
		$this->delete();
		ProductImage::where('product_id', $this->id)->get()->each->delete();
	}


	public function uploadImage($image)
	{
		if ($image == null) {
			return;
		}

		Storage::delete('/uploads/products/' . $this->image);
		$filename = uniqid() . '.' . $image->extension();
		$image->storeAs('/uploads/products/', $filename);
		$this->image = $filename;
		$this->save();
	}

	public function setCategory($id)
	{
		if ($id == null) {
			return;
		}

		$this->category_id = $id;
		$this->save();
	}

	public function getImage()
	{
		if ($this->image == null) {
			return ('/img/no-image.png');
		}
		return ('/uploads/products/' . $this->image);
	}

	public function getCategoryTitle()
	{
		if ($this->category != null) {
			return $this->category->title;
		}

		return 'Нет категории';
	}

	public static function deleteTempImages()
	{
		$dir = '/uploads/temp';
		$files =   Storage::allFiles($dir);
		Storage::delete($files);
	}


	public function hasPrevious()
	{
		return self::where('id', '<', $this->id)->max('id');
	}

	public function getPrevious()
	{
		return self::find($this->hasPrevious());
	}

	public function hasNext()
	{
		return self::where('id', '>', $this->id)->min('id');
	}

	public function getNext()
	{
		return self::find($this->hasNext());
	}

	public function hasNextTwo()
	{

		$products = self::where('id', '>', $this->id)->orderBy('id', 'desc')->take(1)->get();

		if (isset($products[0])) {
			return $products[0]->id;
		}
		return false;
	}

	public function getNextTwo()
	{
		return self::find($this->hasNextTwo());
	}

	public function hasPreviousTwo()
	{

		$products = self::where('id', '<', $this->id)->take(1)->get();

		if (isset($products[0])) {
			return $products[0]->id;
		}
		return false;
	}

	public function getPreviousTwo()
	{
		return self::find($this->hasPreviousTwo());
	}

	public function getMoreProducts()
	{
		$res = [];

		if ($this->hasPrevious()) {
			$res[] = $this->getPrevious();
		} elseif ($this->hasNextTwo()) {
			$res[] = $this->getNextTwo();
		}

		if ($this->hasNext()) {
			$res[] = $this->getNext();
		} elseif ($this->hasPreviousTwo()) {
			$res[] = $this->getPreviousTwo();
		}

		if(isset($res[0]) && isset($res[1])){
			if($res[0]->id === $res[1]->id){
				unset($res[1]);
			}
		}

		return $res;
	}

	public function inCart(){
		foreach (\Cart::getContent() as $item){
			if($item->id === $this->id){return '';}
		}
		return 'dn';
	}

}
