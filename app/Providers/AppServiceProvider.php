<?php

namespace App\Providers;

use App\Info;
use App\Order;
use App\ProductCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('parts.sidebar', function ($view) {
			$view->with('product_categories_sidebar', ProductCategory::all()->take(2));
		});

		view()->composer('parts.headertop', function ($view) {
			$view->with('parts_info', Info::first());
		});
		view()->composer('parts.footer', function ($view) {
			$view->with('parts_info', Info::first());
		});
		view()->composer('parts.headertop', function ($view) {
			$view->with('cart_sum', number_format(\Cart::getTotal(), 2, '.', ''));
		});
		view()->composer('parts.headersecond', function ($view) {
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
			}else{
				$lang = 'lv';
			}

			$view->with('lang_slug', $lang);
		});
		view()->composer('admin.layout', function ($view) {
			$view->with('order_count', Order::where('status', 0)->get()->count());
		});
	}
}
