<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Контакты - Konso Serviss SIA</title>
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

    <div class="contacts-page page">

        <div class="container">

            <div class="wrapper">
                <main class="content">
                @if(session('success'))
                    <div class="success">
                        {{session('success')}}
                    </div>
                @endif
                    <h1 class="contacts-title">Konso serviss - Контакты</h1>

                    <span class="title">Адрес</span>
                    <span class="text">{{$info->address}}<br>
              /baze severstall/<br>
              Riga, Vidzemes priekšpilsēta<br>
              LV-1035<br>
              Latvija</span>
                    <span class="title">Контакты</span>
                    <span class="text"><a href="mailto:{{$info->email}}">{{$info->email}}</a></span>
                    <span class="text"><a href="tel:{{str_replace(' ','', $info->phone)}}">{{$info->phone}}</a></span>

                    <form class="contact-form" method="POST" action="/contacts">
                        {{csrf_field()}}
                        <span class="form-title">Напишите нам</span>
                        <label for="form-name" class="label">Имя</label>
                        <input type="text" id="form-name" required name="name" class="input">
                        <label for="form-email" class="label">E-mail</label>
                        <input type="email" id="form-email" required name="email" class="input">
                        <label for="form-text" class="label">Сообщение</label>
                        <textarea id="form-text" name="text" required class="input"></textarea>
                        <button class="button">Отправить</button>
                    </form>
                </main>

                @include('parts.sidebar')

            </div>
        </div>

    </div>
    <div class="detail">
    </div>

    @include('parts.footer')

</div>


@include('parts.frontjs')

</body>

</html>