@extends('layouts.frontend.profile_layout')
@section('style')
<style>
    .modal-footer>* {
        min-height: 45px !important;
    }
    .order-table tbody tr:hover{
        background-color: gainsboro;
        transform: scale(1.03);
        cursor: pointer;
    }
    .order-table tbody tr{
        transition: transform 0.4s;
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
                <div class="top-sec">
                    <h3 class="border-bottom pb-3">سفارشات من </h3>
                </div>
                <div id="table">
                    @include('frontend.web.profile.orders_partial')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let orderDetails_url = "{{ route('order.details') }}";
    let token = "{{ csrf_token() }}";
    let orders = "{{ json_encode($orders->items()) }}";
    let show_product_url = "{{ route('ware.show', '1234') }}";
</script>
<script src="{{ asset('asset/front/abzar/js/custom/profile/orders.js') }}"></script>
@endsection
