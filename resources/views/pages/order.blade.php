<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Оформление заявки - Konso Serviss SIA</title>
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

    <div class="order-page page">

        <div class="container">
            @if(session('order_status'))
                <div class="success">
                    {{session('order_status')}}
                </div>
            @endif
            <form class="wrapper" method="POST" action="/create-order">
                {{csrf_field()}}
                <main class="content">
                    <h1 class="order-title">Подтверждение заказа</h1>

                    <div class="contact-form order-form">
                        <div class="wrap">
                            <label for="form-name" class="label">Имя</label>
                            <input type="text" id="form-name" name="name" class="input" required>

                            <label for="form-firm" class="label">Фирма</label>
                            <input type="text" id="form-firm" name="firm" class="input" required>

                            <label for="form-email" class="label">E-mail</label>
                            <input type="email" id="form-email" name="email" class="input" required>

                            <label for="form-address" class="label">Улица/Номер дома</label>
                            <input type="text" id="form-address" name="street" class="input" required>
                        </div>
                        <div class="wrap">
                            <label for="form-mailindex" class="label">Почтовый индекс</label>
                            <input type="text" id="form-mailindex" name="postcode" class="input" required>

                            <label for="form-town" class="label">Город</label>
                            <input type="text" id="form-town" name="city" class="input" required>

                            <label for="form-country" class="label">Страна</label>
                            <input type="text" id="form-country" name="country" class="input" required>

                            <label for="form-telephone" class="label">Телефон</label>
                            <input type="text" id="form-telephone" name="phone" class="input" required>
                        </div>

                    </div>

                    <div class="total-block">
                        <span class="total-price">Итого: <span
                                    class="total-goods-price">{{number_format(\Cart::getTotal(), 2, '.', '')}}€</span></span>
                        <button class="button">Оставить заявку</button>
                    </div>

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