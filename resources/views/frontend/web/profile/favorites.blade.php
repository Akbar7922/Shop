@extends('layouts.frontend.profile_layout')
@section('style')
    <style>
        .modal-footer>* {
            min-height: 45px !important;
        }

        .dashboard-section .dashboard-table img {
            width: 65px !important;
        }
        tbody tr:hover{
            cursor: pointer;
        }
        div.pagination nav{
            width: 100%;
        }
        p.small.text-muted{
            margin: auto;
        }
    </style>
@endsection
@section('title')
    پروفایل | سفارشات
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('profile') }}">داشبورد</a></li>
<li class="breadcrumb-item active" aria-current="page">محصولات موردعلاقه</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card dashboard-table mt-0">
                <div class="card-body table-responsive-sm">
                    <div class="top-sec">
                        <h3 class="border-bottom pb-3">علاقه مندی ها </h3>
                    </div>
                    <div id="table">
                        @include('frontend.web.profile.favorites_partial')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
@endsection
@section('scripts')
    <script>
        let isLogin = "{{ Auth::check() }}";
        let addToCartUrl = "{{ route('addToCart') }}";
        let redirect_login_url = "{{ route('redirect_login') }}";
        let cart_url = "{{ route('cart.index') }}";
        let token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('/asset/front/abzar/js/custom/product_add_to_cart.js') }}"></script>
    <script src="{{ asset('/asset/front/abzar/js/custom/profile/favorites.js') }}"></script>
@endsection
