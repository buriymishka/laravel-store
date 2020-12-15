<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Магазин - Konso Serviss SIA</title>
    <meta name="description" content="Магазин Konso - широкий выбор товаров и низкие цены. Autoklav, консервирование, производство консервов в автоклаве. Расскажем, как правильно консервировать продукты и что для этого нужно.">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Basic Images Start -->
@include('parts.favicon')
<!-- Template Basic Images End -->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#DDD">
    <!-- Custom Browsers Color End -->

    @include('parts.frontcss')

</head>

<body>

<div class="main" style="background-image: url(/img/background-image.png);">
    @include('parts.headertop')
    @include('parts.headersecond')

    <div class="store-page page">

        <div class="container">

            <div class="wrapper">

                <main class="content">
                    <h1 class="title">{{ $category_title }}</h1>
                    <div class="items">

                        @foreach($products as $product)
                            <a href="{{route('product', $product->slug)}}" class="item">
                                <div class="bg-img">
                                    <img src="{{$product->getImage()}}" alt="{{$product->title}}">
                                    <div class="overlay"></div>
                                </div>
                                <h5 class="item-title">{{$product->title}}</h5>
                                <span class="price">{{number_format($product->price, 2, '.', '')}} €</span>
                            </a>
                        @endforeach

                    </div>
                </main>

                @include('parts.sidebar')

            </div>
            {{ $products->onEachSide(1)->links()  }}
        </div>

    </div>


    @include('parts.footer')

</div>


@include('parts.frontjs')

</body>

</html>