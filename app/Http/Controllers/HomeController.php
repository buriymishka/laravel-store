<?php

namespace App\Http\Controllers;

use App\Order;
use Darryldecode\Cart\Cart;
use App\Info;
use App\Partner;
use App\Post;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use WindowsAzure\Common\Internal\Atom\Category;

class HomeController extends Controller
{
	public function index()
	{

		$posts = Post::orderBy('id', 'desc')->take(5)->get();
		$product_categories = ProductCategory::all();
		$partners = Partner::all();
		$info = Info::first();

		if (isset($_COOKIE['googtrans'])) {
			if ($_COOKIE['googtrans'] === 'null') {
				$lang = 'lv';
			} else {
				$lang = preg_replace('#/.*/#sUi', '', $_COOKIE['googtrans']);
				if ($lang == 'ru') {
					$lang = 'lv';
				} elseif ($lang == 'lv') {
					$lang = 'ru';
				}
			}
		} else {
			$lang = 'lv';
		}

		return view('pages.index', [
				'posts' => $posts,
				'product_categories' => $product_categories,
				'partners' => $partners,
				'info' => $info,
				'lang_slug' => $lang
		]);
	}


	public function post($slug)
	{

		$post = Post::where('slug', $slug)->firstOrFail();

		$more_posts = $post->getMorePosts();
		return view('pages.post', [
				'post' => $post,
				'more_posts' => $more_posts
		]);
	}


	public function blog($page = 1)
	{
		Paginator::currentPageResolver(function () use ($page) {
			return $page;
		});
		$posts = Post::orderBy('id', 'desc')->paginate(5);


		return view('pages.blog', [
				'posts' => $posts,
		]);
	}


	public function store($category_slug = 0, $page = 1)
	{

		if (is_numeric($category_slug) && $category_slug !== 0) {
			$page = $category_slug;
			$category_slug = 0;
		}
		Paginator::currentPageResolver(function () use ($page) {
			return $page;
		});
		if ($category_slug === 0) {
			$products = Product::orderBy('id', 'desc')->paginate(12);
		} else {
			$category = ProductCategory::where('slug', $category_slug)->firstOrFail();
			$products = Product::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(12);
		}

		if (!isset($category)) {
			$category = (object)[];
			$category->title = 'Наш магазин';
		}

		return view('pages.store', [
				'products' => $products,
				'category_title' => $category->title
		]);
	}

	public function product($slug)
	{
		$product = Product::where('slug', $slug)->firstOrFail();
		$image = $product->image;
		$images_add = ProductImage::where('product_id', $product->id)->pluck('image')->toArray();
		array_push($images_add, $image);
		$images = array_reverse($images_add);

		$more_products = $product->getMoreProducts();

		$in_cart = $product->inCart();

		return view('pages.product', [
				'product' => $product,
				'images' => $images,
				'more_products' => $more_products,
				'in_cart' => $in_cart
		]);
	}

	public function check()
	{
		$items = \Cart::getContent();

		return view('pages.check', [
				'items' => $items
		]);
	}

	public function contacts()
	{
		$info = Info::first();

		return view('pages.contacts', [
				'info' => $info
		]);
	}

	public function order(Request $request)
	{

		foreach ($request->all() as $key => $value) {

			if (preg_match('/product_cart_id_/i', $key)) {
				$id = preg_replace('/product_cart_id_/i', '', $key);
				\Cart::update($id, [
						'quantity' => [
								'relative' => false,
								'value' => $value
						]
				]);
			}
		}

		return redirect()->route('order-form');
	}

	public function orderForm()
	{
		return view('pages.order');
	}

	public function addProduct(Request $request)
	{
		$this->validate($request, [
				'product_id' => 'required|numeric',
				'count' => 'required|numeric|min:1'
		]);

		$product = Product::where('id', $request->get('product_id'))->firstOrFail();

		\Cart::add([
				'id' => $request->get('product_id'),
				'name' => $product->title,
				'price' => $product->price,
				'quantity' => $request->get('count'),
				'attributes' => [
						'image' => $product->getImage(),
						'slug' => $product->slug
				]
		]);

		return redirect()->back();
	}

	public function deleteCartProduct($id)
	{
		\Cart::remove($id);

		return redirect()->back();
	}

	public function createOrder(Request $request)
	{

		$this->validate($request, [
				'name' => 'required',
				'firm' => 'required',
				'email' => 'required',
				'street' => 'required',
				'postcode' => 'required',
				'city' => 'required',
				'country' => 'required',
				'phone' => 'required',
		]);

		$order = Order::add($request->all());

		if ($order === false) {
			return redirect()->back()->with('order_status', 'Корзина пуста');
		}

		$admin = Info::first();

		$headers = "MIME-Version: 1.0" . PHP_EOL .
				"Content-Type: text/html; charset=utf-8" . PHP_EOL .
				'From: <' . $admin->email . '>' . PHP_EOL .
				'Reply-To: ' . $admin->email . '' . PHP_EOL;

		mail($admin->email, 'Konso', 'Новый заказ', $headers);

		return redirect()->back()->with('order_status', 'Заказ принят');
	}

	public function about()
	{

		return view('pages.about');
	}

}
