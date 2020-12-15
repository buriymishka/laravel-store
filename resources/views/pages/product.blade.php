<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>{{$product->title}} - Konso Serviss SIA</title>
    <meta name="description" content="{{ mb_strimwidth( html_entity_decode(strip_tags($product->description)), 0, 250, '') }}">

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

    <div class="product-page page">

        <div class="container">

            <div class="wrapper">

                <main class="content">
                    <h1 class="product-title">{{$product->title}}</h1>
                    <div class="product">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="images">

                            <div class="slider-product-main slider">
                                @foreach($images as $image)
                                    <div class="wrapper-img"><img class="zoom-img" src="/uploads/products/{{$image}}"
                                                                  alt="{{$product->title}}"></div>

                                @endforeach
                            </div>
                            <div class="slider-product-nav slider">
                                @foreach($images as $image)
                                    <img src="/uploads/products/{{$image}}" alt="{{$product->title}}">
                                @endforeach
                            </div>

                        </div>
                        <div class="product-info">
                            <div class="desc">{!!$product->description!!}</div>
                            <span class="price">{{number_format($product->price, 2, '.', '')}}€</span>
                            <span class="count">Количество</span>
                            <input class="input count" min="1" type="number" name="count" value="1">
                            <div id="add-to-cart" class="button">Добавить в корзину</div>
                            <a href="{{route('check')}}" class="button check {{$in_cart}}">Оформить заказ</a>
                        </div>
                    </div>
                    <div class="more sidebar">
                        <h4 class="sidebar-title">
                            Другие товары
                        </h4>
                        <div class="items">
                            @foreach($more_products as $more)
                                <a href="{{route('product', $more->slug)}}" class="item">
                                    <h5 class="title">{{$more->title}}</h5>
                                    <div class="bg-img" style="background-image: url({{$more->getImage()}});">
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
    <div class="detail">
    </div>

    @include('parts.footer')

</div>


@include('parts.frontjs')

<script>
    $('#add-to-cart').on("click", function(){

        var form_data = new FormData();
        form_data.append('count', $('input.count').val());
        form_data.append('product_id', {{$product->id}});
        form_data.append('_token', '{{csrf_token()}}');

        $.ajax({
            url: "{{url('ajax-cart-add')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    alert(data.errors['file']);
                }
                else {
                    let price = $('.header-top .info .price');
                    let sign = price.html();
                    sign = sign.replace(/[0-9]/g, '');
                    sign = sign.replace('.', '');
                    sign = sign.replace(',', '');
                    data += sign;
                    let sum = data;
                    price.html(sum);

                    $('.button.check').removeClass('dn');
                }

            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);

            }
        });
    })
</script>
</body>

</html>