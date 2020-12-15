<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Post;
use App\PostCategory;
use App\Partner;
use App\Product;
use App\ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
				'email_verified_at' => now(),
				'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
				'remember_token' => Str::random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
	return [
			'title' => $faker->sentence,
			'content' => $faker->sentence,
			'image' => 'photo1.png',
			'category_id' => 1,
	];
});

$factory->define(Product::class, function (Faker $faker) {
	return [
			'title' => $faker->sentence,
			'category_id' => 2,
			'description' => $faker->sentence,
			'image' => 'photo1.png',
			'price' => $faker->randomFloat(2, 1, 300)
	];
});

$factory->define(PostCategory::class, function (Faker $faker) {
	return [
			'title' => $faker->word,
			'image' => 'photo1.png',
	];
});

$factory->define(ProductCategory::class, function (Faker $faker) {
	return [
			'title' => $faker->word,
			'image' => 'photo1.png',
	];
});

$factory->define(Partner::class, function (Faker $faker) {
	return [
			'link' => $faker->url,
			'image' => '1.jpg',
	];
});
