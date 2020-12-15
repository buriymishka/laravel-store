<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
	use Sluggable;

	protected $fillable = ['title'];

	public function category()
	{
		$this->hasMany(Product::class);
	}

	public function sluggable()
	{
		return [
				'slug' => [
						'source' => 'title'
				]
		];
	}

	public function getImage(){
		if ($this->image == null){
			return ('/img/no-image.png');
		}
		return ('/uploads/productCategories/' . $this->image);
	}

	public function uploadImage($image)
	{
		if ($image == null) {
			return;
		}

		Storage::delete('uploads/productCategories/' . $this->image);
		$filename = uniqid() . '.' . $image->extension();
		$image->storeAs('/uploads/productCategories/', $filename);
		$this->image = $filename;
		$this->save();
	}

	public static function add($fields){
		$category = new static();
		$category->fill($fields);
		$category->save();

		return $category;
	}

	public function remove()
	{
		Storage::delete('/uploads/productCategories/' . $this->image);
		$this->delete();
	}
}
