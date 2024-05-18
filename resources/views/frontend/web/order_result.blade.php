@extends('layouts.frontend.product-layout')
@section('title')
    سفارش
@endsection
@section('style')
    <style>
        .payment-mode {
            margin-bottom: 5px;
        }

        .tracking_code {
            font-weight: bold;
            color: var(--theme-color);
        }
    </style>
@endsection
@section('content')

    <!-- thank-you section start -->
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text">
                        <div class="checkmark">
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            <svg class="star" height="19" viewbox="0 0 19 19" width="19"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                </path>
                            </svg>
                            @if(in_array(Session::get('order_status')['status'] , [100,200,300]))
                                <svg class="checkmark__check" height="36" viewbox="0 0 48 36" width="48"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                    </path>
                                </svg>
                            @else
                            <img class="checkmark__check" src="{{asset('image/icons/wrong-icon.svg')}}"
                                 width="50px" height="50px" />
                            @endif
                            <svg class="checkmark__background" height="115"
                                 viewbox="0 0 120 115" width="120"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                                </path>
                            </svg>
                        </div>
                        @if(in_array(Session::get('order_status')['status'] , [100,200,300]))
                            <h2>تشکر</h2>
                        @else
                            <h2>باعرض پوزش</h2>
                        @endif
                        @if(Session::exists('order_status'))
                            <p
                                class="
                                @if(in_array(Session::get('order_status')['status'] , [100,200,300]))
                                   text-success @else text-danger @endif font-weight-bold">
                                {{Session::pull('order_status')['message']}}
                            </p>
                        @endif
                        <p class="font-weight-bold">
                            <span>کدرهگیری سفارش : </span>
                            <span class="tracking_code">{{$code}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- order-detail section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        @foreach($order->shopOrder as $shopOrder)
                            @foreach($shopOrder->shopOrderProducts as $product)
                                <div class="row product-order-detail">
                                    <div class="col-3 order_detail">
                                        <div>
                                            <h4>نام محصول</h4>
                                            <h5>{{$product->shopProduct->product->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-3 order_detail">
                                        <div>
                                            <h4>تعداد </h4>
                                            <h5>{{$product->count}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-3 order_detail">
                                        <div>
                                            <h4>قیمت </h4>
                                            <h5>{{number_format($product->price , 0).' ريال'}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-3 order_detail">
                                        <div>
                                            <h4>مجموع </h4>
                                            <h5>{{number_format($product->price * $product->count , 0).' ريال'}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <div class="total-sec">
                            <ul>
                                <li>جمع <span>{{number_format($order->price , 0).' ريال'}}</span></li>
                                <li>حمل و نقل <span>{{number_format($order->send_price , 0).' ريال'}}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>جمع <span>{{number_format($order->price + $order->send_price , 0).' ريال'}}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order-success-sec">
                        <div class="row">
                            <div class="col-sm-6 payment-mode">
                                <h4>روش پرداخت</h4>
                                <p>{{$order->payType->name}}</p>
                            </div>
                            <div class="col-sm-6 payment-mode">
                                <h4>روش ارسال</h4>
                                <p>{{$order->sendType->name}}</p>
                            </div>
                            <div class="col-sm-6 payment-mode">
                                <h4>وضعیت سفارش</h4>
                                <p>{{$order->status->name}}</p>
                            </div>
                            <div class="col-sm-6 payment-mode">
                                <h4>شهر</h4>
                                <p>{{$order->city->name}}</p>
                            </div>
                            <div class="col-sm-12 payment-mode">
                                <h4>آدرس</h4>
                                <p>{{$order->address}}</p>
                            </div>
                            <div class="col-sm-12 payment-mode">
                                <h4>وضعیت تراکنش</h4>
                                @if($order->transaction_id != null)
                                    <p>{{$order->transaction->status->name}}</p>
                                @else
                                    <p>پرداخت نشده</p>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="delivery-sec">
                                    <h3>تاریخ ثبت سفارش :
                                        <span>
                                            {{$order->created_at}}
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

@endsection
@section('scripts')
@endsection
