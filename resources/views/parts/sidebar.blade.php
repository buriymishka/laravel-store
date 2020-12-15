<aside id="sidebar" class="sidebar right">
    <div class="sidebar__inner">

        <div class="title">
            <a href="{{route('store')}}"><h4 class="sidebar-title">Магазин товаров</h4></a>
        </div>
        <div class="items">
            @foreach($product_categories_sidebar as $product_category_sidebar)
                <a href="{{route('store', $product_category_sidebar->slug)}}" class="item">
                    <h5 class="title">{{$product_category_sidebar->title}}</h5>
                    <div class="bg-img" style="background-image: url({{$product_category_sidebar->getImage()}});">
                        <div class="overlay"></div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</aside>