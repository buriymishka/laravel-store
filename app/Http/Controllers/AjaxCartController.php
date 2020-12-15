<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AjaxCartController extends Controller
{
    public function add(Request $request){
		$product = Product::where('id', $request->get('product_id'))->firstOrFail();

    	\Cart::add([
    			'id' => $product->id,
					'name' => $product->title,
					'price' => $product->price,
					'quantity' => $request->get('count'),
					'attributes' => [
						'image' => $product->getImage(),
						'slug' => $product->slug
					]
			]);
    	return (\Cart::getTotal());
		}
}
