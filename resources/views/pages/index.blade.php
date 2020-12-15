<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Konso Serviss SIA</title>
    <meta name="description" content="Autoklav, консервирование, производство консервов в автоклаве. Расскажем, как правильно консервировать продукты и что для этого нужно. В нашем интернет-магазине Вы сможете заказать всё необходимое по низким ценам.">

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
    <header class="header-main" style="background-image: url(/img/header.jpg);">
        <div class="overlay"></div>
        <div class="header-content container">

            <div class="logo header-item">
                <a href="/"><img src="img/logo.png" alt="Логотип"></a>
            </div>
            <div class="adress header-item">
                <span class="adress__adress"><i class="fa fa-map-marker"></i>{{$info->address}}</span>
                <span class="adress__telephone"><i class="fa fa-phone"></i><a
                            href="tel:{{str_replace(' ','', $info->phone)}}">{{$info->phone}}</a></span>
            </div>
            <nav class="main-nav header-item header-nav">
                <ul>
                    <li><a href="{{route('store')}}"><i class="fa fa-angle-right"></i>Наш магазин</a></li>
                    <li><a href="{{route('store', 'tehnika-i-oborudovanie')}}"><i class="fa fa-angle-right"></i>Оборудование</a></li>
                    <li><a href="{{route('store', 'upakovochnye-materialy')}}"><i class="fa fa-angle-right"></i>Упаковочные материалы</a>
                    </li>
                    <li><a href="{{route('blog')}}"><i class="fa fa-angle-right"></i>Наш блог</a></li>
                    <li><a href="{{route('contacts')}}"><i class="fa fa-angle-right"></i>Контакты</a></li>
                    <li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i>О нас</a></li>

                </ul>
                <div><div class="wrap-lang-img"><img src="/img/langs/{{$lang_slug}}.png" alt="lv" data-google-lang="{{$lang_slug}}" class="language__img"></div></div>
            </nav>

            <div class="discript header-item">
                <h1 class="discript__main">Оборудование и тара для консервирования</h1>
                <p class="discript__small">Расскажем, как правильно консервировать продукты и что для этого нужно. В
                    нашем
                    интернет-магазине Вы сможете заказать всё необходимое по низким ценам.</p>
            </div>
        </div>

    </header>

    <section class="section-blog">
        <div class="container">
            <div class="title lines">
                <a href="{{route('blog')}}">
                    <h2 class="title__item">Наш блог</h2>
                </a>
            </div>
            <div class="content">
                <div class="blog-items blog-items-small">
                    @for($i=0; $i<=2; $i++)
                        @if(!isset($posts[$i]))
                            <?php break ?>
                        @endif
                        <a href="{{route('post', $posts[$i]->slug)}}" class="blog-item">
                            <div class="bg-img" style="background-image: url({{$posts[$i]->getImage()}});">
                            </div>
                            <div class="overlay"></div>
                            <div class="item-content">
                                <div class="item__title">{{$posts[$i]->title}}</div>
                                <div class="item__desc">{{ mb_strimwidth( html_entity_decode(strip_tags($posts[$i]->content)), 0, 200, '...') }}</div>
                            </div>
                        </a>

                    @endfor

                </div>


                <div class="blog-items blog-items-large">
                    @for($i=3; $i<=4; $i++)
                        @if(!isset($posts[$i]))
                            <?php break ?>
                        @endif
                        <a href="{{route('post', $posts[$i]->slug)}}" class="blog-item">
                            <div class="bg-img" style="background-image: url({{$posts[$i]->getImage()}});">
                            </div>
                            <div class="overlay"></div>
                            <div class="item-content">
                                <div class="item__title">{{$posts[$i]->title}}</div>
                                <div class="item__desc">{{ mb_strimwidth( html_entity_decode(strip_tags($posts[$i]->content)), 0, 200, '...') }}
                                </div>
                            </div>
                        </a>
                    @endfor

                </div>
            </div>


        </div>
    </section>

    <section class="advantages">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2 class="title__item">Почему мы?</h2>
                </div>
                <div class="items">
                    <div class="item">
                        <div class="icon"><img src="img/time1.svg" alt="Время"></div>
                        <div class="item-title">Давно на рынке</div>
                        <div class="item-desc">Компания Konso Serviss SIA создана в 2000 году, и уже 19 лет успешно
                            работает на
                            прибалтийском рынке.
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="img/money1.svg" alt="Деньги"></div>
                        <div class="item-title">Доступные цены</div>
                        <div class="item-desc">Мы предоставляем товары по низким ценам и делаем скидки при оптовых
                            заказах.
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="img/delivery.png" alt="Доставка"></div>
                        <div class="item-title">Быстрая доставка</div>
                        <div class="item-desc">Вы получите вашу покупку через 2-3 дня после оформления заказа.</div>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="img/handshake1.svg" alt="Рукопожатие"></div>
                        <div class="item-title">Партнёры</div>
                        <div class="item-desc">Konso Serviss — официальный представитель завода Kalmeta, известного
                            производителя
                            отличной упаковки для консервов.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="store">
        <div class="container">
            <div class="content">
                <div class="title">
                    <a href="{{route('store')}}"><h2 class="title__item">Наш магазин</h2></a>
                </div>
                <div class="items">
                    @foreach($product_categories as $product_category)
                        <a href="{{route('store', $product_category->slug)}}" class="item">
                            <div class="store-img">
                                <div class="bg-img"
                                     style="background-image: url({{$product_category->getImage()}});"></div>
                                <div class="overlay"></div>
                            </div>
                            <h5 class="item-title">{{$product_category->title}}</h5>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <div class="content">
                <div class="title lines">
                    <h2 class="title__item">Партнёры</h2>
                </div>
                <div class="items slick-slider main-carousel">
                    @foreach($partners as $partner)
                        <div class="item"><a target="_blank" href="{{$partner->link}}"><img src="{{$partner->getImage()}}" alt="Партнер"
                                                                            class="partner-img"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('parts.footer')

</div>

@include('parts.frontjs')

</body>

</html>