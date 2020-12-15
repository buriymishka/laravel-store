<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

	protected $fillable = ['title', 'content'];

	public function category()
	{
		return $this->belongsTo(PostCategory::class);
	}

	public function sluggable()
	{
		return [
				'slug' => [
						'source' => 'title'
				]
		];
	}

	protected static function add($fields)
	{
		$post = new static();
		$post->fill($fields);
		$post->save();

		return $post;
	}

	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	public function remove()
	{
		Storage::delete('/uploads/posts/' . $this->image);
		$this->delete();
	}


	public function uploadImage($image)
	{
		if ($image == null) {
			return;
		}

		Storage::delete('/uploads/posts/' . $this->image);
		$filename = uniqid() . '.' . $image->extension();
		$image->storeAs('/uploads/posts/', $filename);
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
		return ('/uploads/posts/' . $this->image);
	}

	public function getCategoryTitle()
	{
		if ($this->category != null) {
			return $this->category->title;
		}

		return 'Нет категории';
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

		$posts = self::where('id', '>', $this->id)->orderBy('id', 'desc')->take(1)->get();

		if (isset($posts[0])) {
			return $posts[0]->id;
		}
		return false;
	}

	public function getNextTwo()
	{
		return self::find($this->hasNextTwo());
	}

	public function hasPreviousTwo()
	{

		$posts = self::where('id', '<', $this->id)->take(1)->get();

		if (isset($posts[0])) {
				return $posts[0]->id;
		}
		return false;
	}

	public function getPreviousTwo()
	{
		return self::find($this->hasPreviousTwo());
	}

	public function getMorePosts()
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


}
