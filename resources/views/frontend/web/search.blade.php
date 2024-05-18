@extends('layouts.frontend.product-layout')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('asset/front/abzar/css/toastr.min.css')}}">
<style>
    .filters_div li {
        display: block;
    }

    .filters_div h4 {
        display: inline-block;
        vertical-align: middle;
        margin: 5px 10px;
    }

    .filter-header {
        margin-top: 5px;
        padding: 10px 5px;
        margin-bottom: 12px;
        border-radius: 10px;
        background-color: #f8f8f8;
    }

    .filter-header span {
        float: left;
        margin: 5px 10px;
    }

    .filter-body {
        padding: 3px 8px;
    }

    .filter-body ul li {
        margin: 5px;
        font-size: 1rem;
    }

    .filter-body input[type=checkbox] {
        vertical-align: middle;
    }

    .filter-body label {
        width: 100%;
    }

    .product_add_to_cart {
        background-color: #eef0f1 !important;
        color: black;
        padding: 5px 10px !important;
        margin: 5px !important;
        border-radius: 10px !important;
    }

    .product_add_to_cart:hover {
        background-color: var(--theme-color) !important;
        color: white !important;
    }

    body {
        background: #e74c3c;
        text-align: center;
        font-family: 'Comfortaa', cursive;
    }

    svg {
        width: 100px;
        height: 100px;
        margin: 20px;
        display: inline-block;
    }

    h1 {
        text-align: center;
        color: black;
        margin: 0 0 100px;
        font-size: 34px;
        font-weight: 100;
        text-transform: uppercase;
        background-color: darken(#e74c3c, 5);
        padding: 20px 0;
    }

    .modal-body div {
        text-align: center;
    }

    /* */

    .dots-7 {
        width: 70px !important;
        aspect-ratio: 4;
        --_g: no-repeat radial-gradient(circle closest-side, #ff4141 90%, #faa2a200);
        background:
            var(--_g) 0% 50%,
            var(--_g) 50% 50%,
            var(--_g) 100% 50%;
        background-size: calc(100%/3) 100%;
        animation: d7 1s infinite linear;
    }

    @keyframes d7 {
        33% {
            background-size: calc(100%/3) 0%, calc(100%/3) 100%, calc(100%/3) 100%
        }

        50% {
            background-size: calc(100%/3) 100%, calc(100%/3) 0%, calc(100%/3) 100%
        }

        66% {
            background-size: calc(100%/3) 100%, calc(100%/3) 100%, calc(100%/3) 0%
        }
    }

</style>
@endsection
@section('title')
جستجوی محصول
@endsection
@section('content')
<!--section start-->
<section class="authentication-page">
    <div class="container">
        <section class="search-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form class="form-header">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search_word" placeholder="جستجوی محصولات......">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-solid" id="search_btn"><i class="fa fa-search"></i>جستجو کردن
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- section end -->
<!-- product section start -->
<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="row" style="text-align: center">
                    <button class="btn btn-outline-primary btn-rounded" id="submit_search">
                        <i class="fa fa-filter left"></i>
                        اعمال فیلتر
                        <i class="fa fa-filter"></i>
                    </button>
                </div>
                <div class="filters_div">
                    <!--  div for categories  -->
                    <div>
                        <div class="filter-header">
                            <h4>دسته بندی ها</h4>
                            <span class="fa fa-chevron-down"></span>
                        </div>
                        <div class="filter-body">
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <label for="category{{$category->id}}">
                                        <input type="checkbox" name="category" id="category{{$category->id}}" value="{{$category->id}}" @if(request()->has('category') && request()->get('category')==$category->id) checked @endif>
                                        {{$category->name}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--  div for brands  -->
                    <div>
                        <div class="filter-header">
                            <h4>برند</h4>
                            <span class="fa fa-chevron-down"></span>
                        </div>
                        <div class="filter-body">
                            <ul>
                                @foreach($brands as $brand)
                                <li>
                                    <label for="brand{{$brand->id}}">
                                        <input type="checkbox" name="brand" id="brand{{$brand->id}}" value="{{$brand->id}}" @if(request()->has('brand') && request()->get('brand')==$brand->id) checked @endif>
                                        {{$brand->name}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--  div for Price  -->
                    <div></div>
                    <!--  div for Checkboxs  -->
                    <div>
                        <div class="filter-header">
                            <h4>جسنجوی پیشرفته</h4>
                            <span class="fa fa-chevron-down"></span>
                        </div>
                        <div class="filter-body">
                            <ul>
                                <li>
                                    <label for="exists">
                                        <input type="checkbox" name="exists" id="exists">
                                        محصولات موجود
                                    </label>
                                </li>
                                <li>
                                    <label for="special">
                                        <input type="checkbox" name="special" id="special">
                                        پیشنهاد ویژه
                                    </label>
                                </li>
                                <li>
                                    <label for="rebate">
                                        <input type="checkbox" name="rebate" id="rebate">
                                        محصولات دارای تخفیف
                                    </label>
                                </li>
                                <li>
                                    <label for="pics">
                                        <input type="checkbox" name="pics" id="pics">
                                        محصولات عکس دار
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 ">
                <div class="row" id="loader_div">
                    <div class="dots-7" style="margin:auto;"></div>
                    <span class="text-center" style="display:block;margin: 15px 0px;font-size: 1rem;font-weight: bolder;">درحال دریافت اطلاعات ...</span>
                </div>
                <div class="row search-product" id="product_partial">
                    {{--@foreach($products as $product)
                            <div class="col-xl-2 col-md-4 col-6">
                                <div class="product-box">
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
                <div class="cart-info cart-wrap" style="width: 100%;text-align: center">
                    @if(Auth::check())
                    @php $checkProduct = Auth::user()->carts()->where('shop_product_id' , $product->id)->exists(); @endphp
                    <button type="button" class="product_add_to_cart" data-in-basket="@if($checkProduct) 1 @else 0 @endif" data-id="{{$product->id}}">
                        @if($checkProduct)
                        مشاهده سبدخرید
                        @else
                        افزودن به سبدخرید
                        @endif
                    </button>
                    @else
                    <button type="button" class="product_add_to_cart" data-in-basket="0" data-id="{{$product->id}}"> افزودن به سبدخرید
                    </button>
                    @endif
                </div>
                --}}{{--<div class="cart-info cart-wrap">
                                            <button type="button" data-id="{{$product->id}}" title="اضافه کردن به سبد"
                class="product_add_to_cart"><i class="ti-shopping-cart "></i>
                اضافه کردن به سبد
                </button>
            </div>--}}{{--
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i>
                                        </div>
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
    </div>--}}
    </div>
    </div>
    </div>
    </div>
</section>
<!-- product section end -->


{{-- <div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        <div style="position: fixed;right: 50%;top: 50%;height: 100%;">
            <div class="loader_parent">
                <div class="loader"></div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('modal')
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="search_progress">
                    <!-- Loader 10 -->
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="red" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>
                <div class="wait">
                    لطفا شکیبا باشید ....
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('asset/front/abzar/js/custom/toastr.min.js')}}"></script>
<script>

let isLogin = "{{Auth::check()}}";
let addToCartUrl = "{{route('addToCart')}}";
let token = "{{csrf_token()}}";
let redirect_login_url = "{{route('redirect_login')}}";
let cart_url = "{{route('cart.index')}}";
let search_url = "{{route('search_ajax')}}";
let category = 0;
let brand = 0;
let first = true;
    // $(document).ready(function() {
        @if(request()->has('category'))
        category = "{{request()->get('category')}}";
        @endif
        @if(request()->has('brand'))
        brand = "{{request()->get('brand')}}";
        @endif
    // });

</script>
<script id="script" src="{{asset('/asset/front/abzar/js/custom/product_list_script.js')}}"></script>
<script id="script" src="{{asset('/asset/front/abzar/js/custom/search.js')}}"></script>
<script>
    $('button#submit_search').trigger('click');
</script>
@endsection
