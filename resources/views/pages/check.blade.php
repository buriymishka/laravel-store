<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Корзина - Konso Serviss SIA</title>
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
    @include('parts.headertop')
    @include('parts.headersecond')

    <div class="check-page page">

        <div class="container">

            <form class="wrapper" method="POST" action="order">
                {{csrf_field()}}

                <main class="content">
                    <h1 class="check-title">Ваша корзина</h1>
                    @if(count($items) === 0)
                        <span class="check-title empty">Пусто</span>
                    @else
                        <div class="cart-wrapper">
                            <ul class="check-names">
                                <li class="check-name">Изображение</li>
                                <li class="check-name">Наименование</li>
                                <li class="check-name">Цена</li>
                                <li class="check-name">Количество</li>
                                <li class="check-name">Сумма</li>
                                <li class="check-name">удалить</li>
                            </ul>

                            <div class="items-list">
                                @foreach($items as $item)
                                    <div class="item">
                                        <div class="info">
                                            <a href="{{route('product', $item->attributes->slug)}}" class="bg-img info-item"
                                                 style="background-image: url({{$item->attributes->image}});"></a>
                                            <div class="info-item">{{$item->name}}</div>
                                            <div class="info-item one" data-price="{{$item->price}}"><span
                                                        class="fw-reg">Цена: </span>
                                                {{number_format($item->price, 2, '.', '')}}€
                                            </div>
                                            <div class="info-item"><input type="number" class="input count-input"
                                                                          value="{{$item->quantity}}"
                                                                          name="product_cart_id_{{$item->id}}"
                                                                          min="1"></div>
                                            <div class="info-item total" data-total-price="{{number_format($item->getPriceSum(), 2, '.', '')}}"><span
                                                        class="fw-reg">Сумма: </span><span class="sum">{{number_format($item->getPriceSum(), 2, '.', '')}}€</span>
                                            </div>
                                            <div class="info-item">

                                                    <a href="{{route('delete-cart-product', $item->id)}}"><i class="fa fa-times"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>


                        </div>
                        <div class="total-block">
                            <span class="total-price">Итого: <span class="total-goods-price">{{number_format(\Cart::getTotal(), 2, '.', '')}}€</span></span>
                            <button class="button">Оформить заказ</button>
                        </div>
                    @endif


                </main>

            </form>
        </div>

    </div>
    <div class="detail">
    </div>

    @include('parts.footer')

</div>

@include('parts.frontjs')

</body>

</html>