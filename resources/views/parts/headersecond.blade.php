<div class="second-header">
    <div class="container">

        <div class="menu-btn toggle-mnu"><span></span></div>
        <div class="mobile-menu">
            <div class="mobile-menu-wrapper">

            </div>
        </div>
        <div class="nav-wrapper">
            <nav class="navigation">
                <ul>
                    <li><a href="{{route('store')}}">Наш магазин</a></li>
                    <li><a href="{{route('store', 'tehnika-i-oborudovanie')}}">Оборудование</a></li>
                    <li><a href="{{route('store', 'upakovochnye-materialy')}}">Упаковочные материалы</a></li>
                    <li><a href="{{route('blog')}}">Наш блог</a></li>
                    <li><a href="{{route('contacts')}}">Контакты</a></li>
                    <li><a href="{{route('about')}}">O нас</a></li>
                    <li><div class="wrap-lang-img"><img src="/img/langs/{{$lang_slug}}.png" alt="lv" data-google-lang="{{$lang_slug}}" class="language__img"></div></li>
                </ul>
            </nav>
        </div>
    </div>
</div>