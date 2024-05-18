@extends('layouts.frontend.profile_layout')
@section('style')
<style>
    .modal-footer>* {
        min-height: 45px !important;
    }

</style>
@endsection
@section('title')
پروفایل
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">داشبورد</li>
@endsection
@section('content')
<div class="counter-section">
    <div class="welcome-msg">
        <h4>سلام، {{ Auth::user()->name }}!</h4>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('asset/front/abzar/images/icon/dashboard/sale.png') }}" class="img-fluid">
                <div>
                    <h3>{{ Auth::user()->orders()->count() }}</h3>
                    <h5>کل سفارش</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('asset/front/abzar/images/icon/dashboard/homework.png') }}" class="img-fluid">
                <div>
                    <h3>{{ Auth::user()->orders()->whereIn('status_id' , [1,2])->count() }}</h3>
                    <h5>سفارشات پرداخت نشده</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('asset/front/abzar/images/icon/dashboard/order.png') }}" class="img-fluid">
                <div>
                    <h3>{{ Auth::user()->favorites()->count() }}</h3>
                    <h5>علاقه مندی</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="box-account box-info">
        <div class="box-head">
            <h4>اطلاعات حساب</h4>
            <hr>
            <div class="row">
                <div>
                    <label class="form-label mt-3">
                        <span>کدمعرف</span>
                    </label>
                </div>
                <div>
                    <div class="input-group dashboard-uniqueBox" id="uniqueCodeBox">
                        <div class="input-group-prepend btn btn-primary dashboard-uniqueCorner" data-clipboard-target="#uniqCode">
                            <span style="margin: auto;font-size:12px;">کپی کردن</span>
                            {{-- <i class="fa fa-copy" style="margin: auto;"></i> --}}
                        </div>
                        <span id="uniqCode" class="form-control rounded-left dashboard-uniqueCode">{{ Auth::user()->unique_code }}</span>
                    </div>
                    <div class="invalid-feedback" style="display: block;font-size:14px;">* با دادن این شناسه به دوستانتان ، آنها را به بخواه مارکت دعوت کرده و امتیاز دریافت کنید.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('asset/front/abzar/js/custom/profile/index.js') }}"></script>
@endsection
