@extends('layouts.frontend.product-layout')
@section('style')
<style>

</style>
@endsection
@section('title')
درباره ما
@endsection
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>درباره ما</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                        <li class="breadcrumb-item active">به زودی ...</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div id="container" class="text-center">
            <div>
                <div id="login">
                    <div>
                        <div class="logo mb-4">
                            <a href="#">
                                <img src="{{ asset('image/icons/logo.png') }}" alt="بخواه مارکت"
                                    class="bkh-logo">
                            </a>
                        </div>
                        <h2 class="mb-3">
                            به زودی افتتاح خواهد شد
                        </h2>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <form action="#" class="theme-form">
                                <div class="col-md-12 mt-2">
                                    <h3>ایمیل خود را وارد کنید: </h3>
                                </div>
                                <div class="form-row row">
                                    <div class="col-md-12">
                                        <input type="password" name="password" id="password" class="form-control" autofocus="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="actions">
                                            <button type="submit" class="btn btn-solid">به من اطلاع بده</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('scripts')
@endsection
