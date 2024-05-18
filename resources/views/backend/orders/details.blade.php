@extends('layouts.backend.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view" style="border-bottom: 1px solid #B5B5C3;">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">جزئیات سفارش
                            <span class="text-danger">{{ $order->tracking_code }}</span>
                        </h3>
                    </div>
                    <div class="align-self-center">
                        <button type="button" id="changeStatusOrder" class="btn btn-primary align-self-center">
                            {{ $order->getChangeStatusTitle() }}
                        </button>
                        {{-- <button type="button" id="cancellOrder" class="btn btn-danger align-self-center">
                            کنسل
                        </button> --}}
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">نام کامل</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $order->user->getFullName() }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">روش ارسال</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $order->sendType->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">روش پرداخت</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 text-gray-800 me-2">{{ $order->payType->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">وضعیت سفارش</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $order->status->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">وضعیت پرداخت</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $order->paymentStatus->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted">کدرهگیری</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $order->tracking_code }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-4 fw-bold text-muted">مبلغ سفارش</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ number_format($order->price , 0).' ريال' }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-4 fw-bold text-muted">هزینه ارسال</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ number_format($order->send_price , 0).' ريال' }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-4 fw-bold text-muted">تاریخ سفارش</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $order->created_at }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-4 fw-bold text-muted">آدرس</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $order->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($order->shopOrder as $shopOrder)
            <div class="card-body pt-0">
                <div class="card-title m-0" style="text-align: center;margin-bottom: 2rem !important;">
                    <h3 class="fw-bolder m-0">{{$shopOrder->shop->name}}</h3>
                </div>
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <thead>
                        <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                            <th class="w-10px pe-2">
                                ردیف
                            </th>
                            <th>تصویر</th>
                            <th>نام محصول</th>
                            <th>قیمت پایه</th>
                            <th>تعداد</th>
                            <th>قیمت کل</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600 text-center">
                        @foreach($shopOrder->shopOrderProducts as $item)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                @if(sizeof(json_decode($item->shopProduct->pictures)) > 0 )
                                <img src="{{asset('/image/shop_product/'.$item->shop_product_id.'/'.json_decode($item->shopProduct->pictures , true)[0]['picture'])}}" alt="{{$item->shopProduct->product->name}}" class="img-thumbnail dashboard-img">
                                @else
                                <img src="{{asset('/image/shop_product/no_picture.png')}}" alt="{{$item->shopProduct->product->name}}" class="img-thumbnail dashboard-img">
                                @endif
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$item->shopProduct->product->name}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{number_format($item->price , 0)}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$item->count}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{number_format($item->count * $item->price,0)}}</span>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="{{ route('ware.show' , $item->shopProduct->slug) }}" class="menu-link px-3">مشاهده</a>
                                    </div>
                                    {{-- <div class="menu-item px-3">
                                        <a href="" class="menu-link px-3" data-kt-customer-table-filter="delete_row">تغییر وضعیت</a>
                                    </div> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div>
                        {{$orders->links()}}
            </div> --}}
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/order.details.js') }}"></script>
<script>
    let token = "{{csrf_token()}}";
    let changeOrderStatusUrl = "{{ route('order.status.change' , $order->tracking_code) }}";
    let refreshUrl = "{{ request()->url() }}";
    let trackingCode = "{{ $order->tracking_code }}";
    let status = "{{ $order->getChangeStatusTitle() }}";
</script>
@endsection
