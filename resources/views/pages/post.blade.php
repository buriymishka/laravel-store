<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>{{$post->title}} - Konso Serviss SIA</title>
    <meta name="description" content="{{ mb_strimwidth( html_entity_decode(strip_tags($post->content)), 0, 250, '') }}">

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

    <div class="post-page page">

        <div class="container">

            <div class="wrapper">

                <main class="content">
                    <h1 class="post-title">{{$post->title}}</h1>
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>

                    <div class="more sidebar">
                        <h4 class="sidebar-title">
                            Другие статьи
                        </h4>
                        <div class="items">
                            @foreach($more_posts as $more_post)
                                <a href="{{route('post', $more_post->slug)}}" class="item">
                                    <h5 class="title">{{$more_post->title}}</h5>
                                    <div class="bg-img" style="background-image: url({{$more_post->getImage()}});">
                                        <div class="overlay"></div>
                                    </div>
                                </a>
                            @endforeach



                        </div>
                    </div>
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