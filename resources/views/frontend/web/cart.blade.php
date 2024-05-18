@extends('layouts.frontend.product-layout')
@section('style')
<style>
    tbody {
        font-size: 15px;
    }

    .cart-section tbody tr td a {
        font-size: 14px !important;
        font-weight: bold !important;
    }

    .cart-section tbody tr td {
        min-width: unset !important;
    }

    .table {
        width: 98% !important;
    }

</style>
@endsection
@section('title')
سبد خرید
@endsection
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>سبد خرید</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                        <li class="breadcrumb-item active">سبد خرید</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="cart-section section-b-space">
    <div class="container" id="cartContainer">
        @if(Auth::user()->carts()->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table" id="cartTable">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">تصویر</th>
                            <th scope="col">اسم محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">واحد</th>
                            <th scope="col">جمع</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total_cart_price = 0; @endphp
                        @foreach($cart as $product)
                        @php
                        $total_cart_price += $product->total();
                        @endphp
                        <tr data-id="{{$product->id}}" data-price="{{$product->getPrice()}}">
                            <td class="text-center">
                                <a href="{{route('ware.show' , $product->shopProduct->slug)}}">
                                    @if(sizeof(json_decode($product->shopProduct->pictures)) > 0 )
                                    <img alt="" src="{{asset('image/shop_product/'.$product->shopProduct->id.'/'.json_decode($product->shopProduct->pictures)[0]->picture)}}" />
                                    @else
                                    <img alt="" src="{{asset('image/shop_product/no_picture.png')}}" />
                                    @endif
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="font-weight-bold" href="{{route('ware.show' , $product->shopProduct->slug)}}">
                                    {{$product->shopProduct->product->name}}
                                </a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number" value="{{$product->count}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        @if($product->discount_id > 0)
                                        <del class="td-color">{{number_format($product->shopProduct->price , 0).' ريال'}}</del>
                                        <h2 class="td-color">{{number_format($product->discount->calculateDiscount($product->shopProduct->price) , 0).' ريال'}}</h2>
                                        @else
                                        <h2 class="td-color">{{number_format($product->shopProduct->price , 0).' ريال'}}</h2>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if($product->discount_id > 0)
                                <del class="td-color">{{number_format($product->shopProduct->price , 0).' ريال'}}</del>
                                <span class="td-color">{{number_format($product->discount->calculateDiscount($product->shopProduct->price) , 0).' ريال'}}</span>
                                @else
                                <span class="td-color">{{number_format($product->shopProduct->price , 0).' ريال'}}</span>
                                @endif

                                {{-- <span>{{number_format($product->shopProduct->price , 0 )}}</span>
                                <span>&nbsp;ريال</span> --}}
                            </td>
                            <td class="text-center">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control input-number cart-count" min="1" max="{{$product->shopProduct->count}}" value="{{$product->count}}">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span>{{ $product->shopProduct->unit->name }}</span>
                            </td>
                            <td class="text-center">
                                <span class="td-color total_price">{{number_format($product->total() , 0)}}</span>
                                <span class="td-color">&nbsp;ريال</span>
                            </td>
                            <td class="text-center">
                                <span class="btn btn-outline-danger rounded-circle cart_item_delete" data-id="{{$product->id}}">
                                    <i class="fa fa-trash"></i>
                                    <span class="spinner-border spinner-border-sm align-middle" style="display: none;"></span>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>قیمت کل :</td>
                                <td>
                                    <h2 id="total_cart_price" style="display: inline-block;">{{number_format($total_cart_price , 0)}}</h2>
                                    <span>&nbsp;ريال</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <form id="submit_cart_form" action="{{route('submitCart')}}" method="post">
                @csrf
                <input type="hidden" name="data" id="data">
                <button type="button" class="col-2 btn btn-success btn-rounded">ادامه خرید</button>
            </form>
        </div>
        @else
        <div class="alert alert-info">
            <h5 class="font-weight-bold">* سبدخرید شما خالی میباشد.</h5>
        </div>
        <div class="col-6" style="float: left">
            <a href="{{route('home')}}" class="link-primary back_home" style="">
                <i class="fa fa-home"></i>
                بازگشت به صفحه اصلی
            </a>
        </div>
        @endif
    </div>
</section>
<!--section end-->
@endsection
@section('scripts')
<script>
    let token = "{{csrf_token()}}";
    let delete_cart_item_link = "{{route('deleteFromCart')}}";
    let homeUrl = "{{ route('home') }}";
</script>
<script src="{{asset('/asset/front/abzar/js/custom/cart.js')}}"></script>
@endsection
