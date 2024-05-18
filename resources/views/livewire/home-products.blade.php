<div>
    <div class="product-5 product-m arrow-steps">
        @foreach($products as $product)
        <div class="product-box product-wrap">
            <div class="img-wrapper">
                <div class="front">
                    <a href="{{route('ware.show' , $product->slug)}}">
                        @if(sizeof(json_decode($product->pictures)) > 0 )
                        <img alt="" src="{{asset('image/shop_product/'.$product->id.'/'.json_decode($product->pictures)[0]->picture)}}" class="img-fluid blur-up lazyload bg-img">
                        @else
                        <img alt="" src="{{asset('image/shop_product/no_picture.png')}}" class="img-fluid blur-up lazyload bg-img">
                        @endif
                    </a>
                </div>
                <div class="cart-info cart-wrap">
                    <a title="اضافه کردن به علاقه مندی" class="product_add_to_fav" data-id="{{ $product->id }}">
                        <i class="fa fa-heart"></i>
                        <span class="spinner-border spinner-border-sm align-middle" style="display: none;"></span>
                    </a>
                    <button type="button" data-id="{{$product->id}}" title="اضافه کردن به سبد" class="product_add_to_cart"><i class="ti-shopping-cart "></i>
                        اضافه کردن به سبد
                    </button>
                </div>
            </div>
            <div class="product-info">
                <a href="{{route('ware.show' , $product->slug)}}">
                    <h6>{{$product->product->name}}</h6>
                </a>
                <h4>
                    {{number_format($product->price , 0)}}
                    <span>ریال</span>
                </h4>
            </div>
        </div>
        @endforeach
    </div>
</div>
