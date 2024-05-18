<div class="tools-product-4 product-m">
    @foreach($products as $product)
        <div class="product-box product-wrap">
            <div class="img-wrapper">
                <div class="ribbon"><span>جدید  </span></div>
                <div class="front">
                    <a href="product-page(no-sidebar).html">
                        @if(sizeof(json_decode($product->pictures)) > 0 )
                            <img alt=""
                                 src="{{asset('image/shop_product/'.json_decode($product->pictures)[0]->picture)}}"
                                 class="img-fluid blur-up lazyload bg-img">
                        @else
                            <img alt="" src="{{asset('image/shop_product/no_picture.png')}}"
                                 class="img-fluid blur-up lazyload bg-img">
                        @endif
                    </a>
                </div>
                <div class="cart-info cart-wrap">
                    <a href="" title="اضافه کردن به علاقه مندی"><i
                            class="fa fa-heart"></i></a>
                    <button title="اضافه کردن به سبد" data-id="{{$product->id}}"
                            class="product_add_to_cart"><i
                            class="ti-shopping-cart"></i>
                        اضافه کردن به سبد
                    </button>
                    <a href="compare.html" title="مقایسه "><i class="fa fa-sync-alt"></i></a>
                    <a class="mobile-quick-view" href="#" data-bs-toggle="modal"
                       data-bs-target="#quick-view" title="دیدن سریع"><i class="ti-search"></i></a>
                </div>
                <div class="quick-view-part">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="دیدن سریع"><i
                            class="ti-search"></i></a>
                </div>
            </div>
            <div class="product-info">
                <a href="product-page(no-sidebar).html">
                    <h6>{{$product->name}}</h6>
                </a>
                <h4>{{$product->price}}</h4>
            </div>
        </div>
    @endforeach
</div>
