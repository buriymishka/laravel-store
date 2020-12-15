<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class PostCategory extends Model
{
	use Sluggable;

	protected $fillable = ['title'];

	public function posts()
	{
		return $this->hasMany(Post::class);
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
		return ('/uploads/postCategories/' . $this->image);
	}

	public function uploadImage($image)
	{
		if ($image == null) {
			return;
		}

		Storage::delete('uploads/postCategories/' . $this->image);
		$filename = uniqid() . '.' . $image->extension();
		$image->storeAs('/uploads/postCategories/', $filename);
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
		Storage::delete('/uploads/postCategories/' . $this->image);
		$this->delete();
	}
}
