<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\ProductImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function ajaxImage(Request $request){
			if ($request->isMethod('get'))
				return view('ajax_image_upload');
			else {
				$validator = Validator::make($request->all(),
						[
								'file' => 'image',
						],
						[
								'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
						]);
				if ($validator->fails())
					return array(
							'fail' => true,
							'errors' => $validator->errors()
					);
				$extension = $request->file('file')->getClientOriginalExtension();
				$dir = 'uploads/temp/';
				$filename = uniqid() . '_' . time() . '.' . $extension;
				$request->file('file')->move($dir, $filename);
				return $filename;
			}
		}

		public function ajaxImageDelete(Request $request){
    	Storage::delete($request->path);
    	return 1;
		}

		public function ajaxImageDeleteStorage(Request $request){
    	$filename = basename($request->path);
    	$file = ProductImage::where('image', $filename);
    	Storage::delete('/uploads/products/' . $filename);
			$file->delete();
		}
}
