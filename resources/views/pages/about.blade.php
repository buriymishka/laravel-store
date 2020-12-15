<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>О нас - Konso Serviss SIA</title>
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

    <div class="about-page page">

        <div class="container">

            <div class="wrapper">

                <main class="content">
                    <h1 class="about-title">О нас</h1>

                    <p class="info">
                        Компания Konso Serviss SIA создана в 2000 году, и уже 17 лет успешно работает на прибалтийском рынке.
                        <br>
                        Мы предлагаем компаниям и частным лицам технику и тару для консервирования. У нас есть интернет-магазин,
                        где можно купить:
                    </p>
                    <ul class="info">
                        <li>— автоклавы;</li>
                        <li>— закаточные машинки;</li>
                        <li>— вакуумизаторы;</li>
                        <li>— стеклянные банки, консервные банки из жести;</li>
                        <li>— пластиковую и деревянную тару.</li>
                    </ul>
                    <br>
                    <p class="info">
                        Ассортимент у нас широкий, а цены более чем доступные.
                        <br><br>
                        Konso Serviss — официальный представитель завода Kalmeta, известного производителя отличной упаковки для
                        консервов. Сотрудничаем мы и с другими компаниями, стремясь предлагать нашим покупателям только лучшие
                        товары от проверенных производителей.
                        <br><br>
                        На нашем сайте вы можете купить технику и упаковку с доставкой, или можете забрать товары со склада в Риге,
                        на Пурвциема 18.
                        <br><br>
                        В разделах «Техника- справочник», «Упаковка-справочник» и «Полезно знать» вы найдете много полезной
                        информации о консервировании и пастеризации: описания техники и упаковки, ответы на самые попопулярнее
                        вопросы. Есть рецепты консервирования и пастеризации различных продуктов, и много чего еще.
                        <br><br>
                        Мы стремимся быть главным помощникам всех, кто занимается консервированием в Латвии, Литве и Эстонии.
                        Обратившись к нам, вы получите подробную консультацию и, скорее всего, не уйдете без покупки.
                        <br><br>
                        Konso Serviss работает для вас!
                    </p>
                    <img class="info-img" src="/img/o-nas-1.jpg" alt="Банки">

                </main>

                @include('parts.sidebar')

            </div>
        </div>

    </div>

    @include('parts.footer')

</div>


@include('parts.frontjs')

</body>

</html>