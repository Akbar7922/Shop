@extends('layouts.frontend.profile_layout')
@section('style')
<style>
    .modal-footer>* {
        min-height: 45px !important;
    }

    .updates_alert span {
        font-size: 0.85rem;
        margin-right: 3px;
        margin-left: 3px;
        padding: 6px 10px;
        background-color: #f97d15;
    }

</style>
@endsection
@section('title')
پروفایل | سفارشات
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('profile') }}">داشبورد</a></li>
<li class="breadcrumb-item active" aria-current="page">تاریخچه سفارشات</li>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card dashboard-table mt-0">
            <div class="card-body table-responsive-sm">
                <div class="top-sec row">
                    <h3 class="col-5">سفارش شماره : {{ $order->tracking_code }} </h3>
                    @if($order->status_id == 1)
                    <span class="col-5" style="margin-right: 1rem;text-align: center;">
                        <form action="{{ route('payOrder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tracking_code" value="{{ $order->tracking_code }}">
                            <button type="submit" class="btn btn-primary rounded col-6" style="font-size: 0.8rem;">
                                <i class="fa fa-credit-card-alt" style="vertical-align: middle;margin-left: 8px;"></i>
                                پرداخت
                            </button>
                        </form>
                    </span>
                    @endif
                </div>
                <div class="row">
                    @if(Session::exists('order_update'))
                    <ul class="updates_alert">
                        @foreach (Session::pull('order_update') as $res)
                        <li class="alert alert-danger">
                            @if ($res['status'] == 1)
                            تعداد درخواستی محصول <span class="badge rounded-pill">{{ $res['message'] }}</span> موجود نمیباشد .
                            @elseif ($res['status'] == 0)
                            قیمت محصول <span class="badge rounded-pill">{{ $res['message'] }}</span> از <span class="badge rounded-pill">{{ number_format($res['old_price'],0).' ريال' }}</span>
                            به <span class="badge rounded-pill">{{ number_format($res['new_price'],0).' ريال' }}</span> تغییر یافته.
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row order_details_item">
                            <div class="col-4">هزینه ارسال : </div>
                            <div class="col-8">
                                <span id="send_price">{{ number_format($order->send_price, 0) . ' ريال' }}</span>
                            </div>
                        </div>
                        <div class="row order_details_item">
                            <div class="col-4">مبلغ کل : </div>
                            <div class="col-8">
                                <span id="price">{{ number_format($order->price, 0) . ' ريال' }}</span>
                            </div>
                        </div>

                        <div class="row order_details_item">
                            <div class="col-4">وضعیت سفارش : </div>
                            <div class="col-8">
                                <span id="status" class="badge rounded-pill @if($order->status_id == 1) bg-danger @else bg-success @endif custom-badge">
                                    {{ $order->status->name }}
                                </span>
                            </div>
                        </div>

                        <div class="row order_details_item">
                            <div class="col-4">روش پرداخت : </div>
                            <div class="col-8">
                                <span id="payType" class="badge rounded-pill bg-success custom-badge">
                                    {{ $order->payType->name }}
                                </span>
                            </div>
                        </div>

                        <div class="row order_details_item">
                            <div class="col-4">روش ارسال : </div>
                            <div class="col-8">
                                <span id="sendType" class="badge rounded-pill bg-success custom-badge">
                                    {{ $order->sendType->name }}
                                </span>
                            </div>
                        </div>

                        <div class="row order_details_item">
                            <div class="col-4">تاریخ ایجاد : </div>
                            <div class="col-8">
                                <span id="created_at">{{ $order->created_at }}</span>
                            </div>
                        </div>

                        <div class="row order_details_item">
                            <div class="col-4">آدرس : </div>
                            <div class="col-8">
                                <span id="address">{{ $order->address }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="table-responsive-xl">
                    <table class="table cart-table wishlist-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">نام محصول </th>
                                <th scope="col">تعداد</th>
                                <th scope="col">قیمت</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td scope="col">{{ $item->shopProduct->product->name }} </td>
                                <td scope="col">{{ $item->count }}</td>
                                <td scope="col">{{ number_format($item->price, 0) . ' ريال' }}</td>
                                <td scope="col">
                                    <a href="{{ route('ware.show' , $item->shopProduct->slug) }}">
                                        <button class="btn btn-primary rounded">
                                            <i class="fa fa-eye" style="vertical-align: middle;margin-left:5px;"></i>
                                            مشاهده
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let token = "{{ csrf_token() }}";
    let show_product_url = "{{ route('ware.show', '1234') }}";

</script>
@endsection
