<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>Блог - Konso Serviss SIA</title>
    <meta name="description" content="Блог Konso Serviss о консервирование, производство консервов в автоклаве, упаковочных материалах. Расскажем, как правильно консервировать продукты и что для этого нужно. В нашем интернет-магазине Вы сможете закать всё необходимое по низким ценам.">

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

    <div class="blog-page page">

        <div class="container">
            <div class="title lines">
                <h1 class="title__item">Наш блог</h1>
            </div>

            <div class="wrapper">

                <main class="content">
                    <div class="articles">

                        @foreach($posts as $post)
                            <a href="{{route('post', $post->slug)}}" class="item">
                                <div class="blog-img" style="background-image: url({{$post->getImage()}});">
                                    <div class="overlay"></div>
                                </div>
                                <div class="info">
                                    <h3 class="title-article">{{$post->title}}</h3>
                                    <div class="description">{{ mb_strimwidth(html_entity_decode(strip_tags($post->content)), 0, 200, '...') }}</div>
                                    <span class="button">Читать статью</span>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </main>

                @include('parts.sidebar')

            </div>

            {{$posts->onEachSide(1)->links()}}

        </div>

    </div>


    @include('parts.footer')

</div>


@include('parts.frontjs')

</body>

</html>