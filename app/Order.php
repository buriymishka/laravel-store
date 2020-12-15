<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = [
			'name',
			'firm',
			'email',
			'street',
			'postcode',
			'city',
			'country',
			'phone'
	];

	public static function add($fields){
		$order = new static();
		$order->fill($fields);
		$order->price = \Cart::getTotal();
		if((\Cart::getTotalQuantity()) === 0){
			return false;
		}

		$str = '<br>';
		$i = 1;
		foreach (\Cart::getContent() as $item) {
			$str .= $i .'.  '. $item->name . '<br> Кол-во: ' . $item->quantity . '<br> Сумма: ' . $item->getPriceSum() . '€' . '<br>' . '<a href=' . route("product", $item->attributes->slug) . '>' . route('product', $item->attributes->slug) . '</a>' . '<br><br>';
			$i++;
		}
		$str .= 'Сумма заказа: ' . number_format(\Cart::getTotal(), 2, '.', '') . '€';
		$order->cart = $str;
		$order->save();

		return $order;
	}
}
