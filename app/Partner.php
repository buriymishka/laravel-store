<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
	protected $fillable = [
			'link'
	];

	protected static function add($fields)
	{
		$partner = new static();
		$partner->fill($fields);
		$partner->save();

		return $partner;
	}

	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	public function remove()
	{
		Storage::delete('/uploads/partners/' . $this->image);
		$this->delete();
	}

	public function getImage()
	{
		if ($this->image == null) {
			return ('/img/no-image.png');
		}
		return ('/uploads/partners/' . $this->image);
	}

	public function uploadImage($image)
	{
		if ($image == null) {
			return;
		}

		Storage::delete('uploads/partners/' . $this->image);
		$filename = uniqid() . '.' . $image->extension();
		$image->storeAs('/uploads/partners/', $filename);
		$this->image = $filename;
		$this->save();
	}
}
