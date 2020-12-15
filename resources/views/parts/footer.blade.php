<footer class="footer">
    <div class="container">
        <div class="content">

            <div class="main-nav footer-nav item">
                <ul>
                    <li><a href="{{route('store')}}"><i class="fa fa-angle-right"></i>Наш магазин</a></li>
                    <li><a href="{{route('store', 'tehnika-i-oborudovanie')}}"><i class="fa fa-angle-right"></i>Оборудование</a></li>
                    <li><a href="{{route('store', 'upakovochnye-materialy')}}"><i class="fa fa-angle-right"></i>Упаковочные материалы</a></li>
                    <li><a href="{{route('blog')}}"><i class="fa fa-angle-right"></i>Наш блог</a></li>
                    <li><a href="{{route('contacts')}}"><i class="fa fa-angle-right"></i>Контакты</a></li>
                    <li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i>О нас</a></li>
                </ul>
            </div>
            <div class="logo item">
                <a href="/"><img src="/img/logo.png" alt=""></a>
            </div>
            <div class="contacts item">
                <span class="adress__adress contact-item"><i class="fa fa-map-marker"></i>{{$parts_info->address}}</span>
                <span class="adress__telephone contact-item"><i class="fa fa-phone"></i><a href="tel:{{str_replace(' ','', $parts_info->phone)}}">{{$parts_info->phone}}</a></span>
                <span class="adress__email contact-item"><i class="fa fa-envelope"></i><a
                            href="mailto:{{$parts_info->email}}">{{$parts_info->email}}</a></span>
            </div>

        </div>
    </div>
</footer>