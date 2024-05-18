@if($products)
@foreach($products as $product)
    <div class="col-xl-2 col-md-4 col-6">
        <div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="{{route('ware.show' , $product->slug)}}">
                        @if(sizeof(json_decode($product->pictures)) > 0 )
                            <img alt=""
                                 src="{{asset('image/shop_product/'.$product->id.'/'.json_decode($product->pictures)[0]->picture)}}"
                                 class="img-fluid blur-up lazyload bg-img custom_img">
                        @else
                            <img alt="" src="{{asset('image/shop_product/no_picture.png')}}"
                                 class="img-fluid blur-up lazyload bg-img custom_img">
                        @endif
                    </a>
                </div>
                <div class="cart-info cart-wrap" style="width: 100%;text-align: center">
                    @if(Auth::check())
                        @php $checkProduct = Auth::user()->carts()->where('shop_product_id' , $product->id)->exists();  @endphp
                        <button type="button" class="product_add_to_cart"
                                data-in-basket="@if($checkProduct) 1 @else 0 @endif"
                                data-id="{{$product->id}}">
                            @if($checkProduct)
                                مشاهده سبدخرید
                            @else
                                افزودن به سبدخرید
                            @endif
                        </button>
                    @else
                        <button type="button" class="product_add_to_cart"
                                data-in-basket="0"
                                data-id="{{$product->id}}"> افزودن به سبدخرید
                        </button>
                    @endif
                </div>
                {{--<div class="cart-info cart-wrap">
                    <button type="button" data-id="{{$product->id}}" title="اضافه کردن به سبد"
                            class="product_add_to_cart"><i
                            class="ti-shopping-cart "></i>
                        اضافه کردن به سبد
                    </button>
                </div>--}}
            </div>
            <div class="product-detail">
                <a href="{{route('ware.show' , $product->slug)}}">
                    <h6>{{$product->product->name}}</h6>
                </a>
                <h4>
                    {{number_format($product->price , 0)}}
                    <span>ریال</span>
                </h4>
            </div>
        </div>
    </div>
@endforeach
<div id="pagination">
    {{$products->links()}}
</div>
@else
<div>
    <div class="alert alert-danger">محصولی یافت نشد !</div>
</div>
@endif
<script id="script" src="{{asset('/asset/front/abzar/js/custom/product_list_script.js')}}"></script>
