<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $config = App\Models\Config::first();
    @endphp
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="/{{ asset('images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('image/icons/baner2.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/toastr.min.css') }}">

    @yield('style')
    <title>
        @yield('title')
    </title>


    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/font-awesome.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/themify-icons.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/vendors/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/profile.css') }}">

    <style>

    </style>

</head>

<body class="theme-color-1 rtl">

    <!-- header start -->
    <header class="header-tools">
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>به فروشگاه {{ $config->app_name }} خوش آمدید</li>
                                <li><i class="fa fa-phone"></i>شماره تماس : {{ $config->mobile }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        @if (Auth::check())
                        <div>
                            <div class="header-dropdown header-custom">
                                <a href="{{ route('cart.index') }}">
                                    <span style="color: white">
                                        <i class="fa fa-shopping-cart"></i>
                                        سبد خرید
                                    </span>
                                </a>
                            </div>
                            <ul class="header-dropdown header-custom">
                                <li class="onhover-dropdown">
                                    <i class="fa fa-user"></i>
                                    {{ 'سلام ' . Auth::user()->name . ' عزیز !' }}
                                    <ul class="onhover-show-div">
                                        <li>
                                            <i class="fa fa-shopping-cart"></i>
                                            <a href="{{ route('cart.index') }}">سبدخرید</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-dashboard"></i>
                                            <a href="{{ route('profile') }}">مدیریت حساب</a>
                                        </li>
                                        @if(Auth::user()->isAdmin())
                                        <li>
                                            <i class="fa fa-support"></i>
                                            <a href="{{ route('dashboard') }}">پنل مدیریت</a>
                                        </li>
                                        @endif
                                        <li id="closeBtn">
                                            <i class="fa fa-close"></i>
                                            <a>خروج</a>
                                            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @else
                        <ul class="header-dropdown">
                            <li class="onhover-dropdown mobile-account">
                                <i class="fa fa-user"></i> حساب کاربری
                                <ul class="onhover-show-div">
                                    <li><a href="{{ route('login') }}">ورود / ثبت نام</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-menu-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-right pull-right">
                                <div>
                                    <nav id="main-nav">
                                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                            <li>
                                                <div class="mobile-back text-end">برگشت<i class="fa fa-angle-right ps-2"></i></div>
                                            </li>
                                            <li><a href="{{ route('home') }}">خانه</a></li>
                                            <li class="mega" id="hover-cls">
                                                <a href="#">محصولات
                                                </a>
                                                <ul class="mega-menu full-mega-menu">
                                                    <li>
                                                        <div class="container">
                                                            <div class="row">
                                                                @foreach ($categories as $category)
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="menu-title">
                                                                            <h5>{{ $category->name }}</h5>
                                                                        </div>
                                                                        @if ($category->children)
                                                                        @foreach ($category->children as $children)
                                                                        <div class="menu-content">
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="{{ route('search', ['category' => $children->id]) }}">{{ $children->name }}</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('soon') }}">مقالات</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('about') }}">درباره ما</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>داشبورد</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <div class="profile_box">
                                    <img src="{{ asset('image/users/' . Auth::user()->pic) }}" alt="" class="img-fluid">
                                    <div class="profile_icon_edit">
                                        <button class="btn btn-outline-success btn-rounded" id="btn_changeAvatar">
                                            <i class="fa fa-pencil" style="vertical-align: middle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-detail">
                                <h5>{{ Auth::user()->name . ' ' . Auth::user()->family }}</h5>
                                <p class="text-center" style="margin-top: 15px;">{{ Auth::user()->mobile }}</p>
                                <div class="row">
                                    <a class="link-primary link" id="change_password">تغییر رمزعبور</a>
                                </div>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="sidebar">
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link @if (request()->url() == route('profile')) active @endif ">اطلاعات
                                        حساب</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile.addresses') }}" class="nav-link @if (request()->url() == route('profile.addresses')) active @endif ">آدرس</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile.orders') }}" cl class="nav-link @if (request()->url() == route('profile.orders')) active @endif ">سفارشات من
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile.favorites') }}" class="nav-link @if (request()->url() == route('profile.favorites')) active @endif ">علاقه مندی ها
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile.edit') }}" class="nav-link @if (request()->url() == route('profile.edit')) active @endif ">ویرایش
                                        اطلاعات کاربری
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="logout" class="nav-link">خروج </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->

    <!-- footer start -->
    <footer class="footer-light">
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>درباره ما </h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo">
                                <img src="{{ asset('image/icons/logo/large.png') }}" alt="" style="width: 100px">
                            </div>
                            <p>{{ $config->slogan }}</p>
                            <p style="text-align: center;margin-top: 0.5rem">
                                {{-- <h4>
                                    * هایپرمارکت را به خانه خود بیاورید *
                                </h4> --}}
                            </p>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-telegram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-mail-forward"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col offset-xl-1 ">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>دسته بندی محصولات </h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                    <li><a href="#">مردانه </a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                    <div class="col-3">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>چرا ما </h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li>قیمت مناسب</li>
                                    <li>ارسال مطمئن </li>
                                    <li>تنوع محصولات</li>
                                    <li>شرایط پرداخت</li>
                                    <li>خرید مطمئن</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>درباره ما بدانید</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-phone"></i>تماس با ما : {{ $config->mobile }}</li>
                                    <li><i class="fa fa-envelope"></i>ایمیل ما : {{ $config->email }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- footer end -->

    @yield('modal')

    <!-- Start Avatar Picture Modal -->
    <div class="modal fade " id="modal_avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">تغییر تصویر پروفایل</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa fa-close"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="fv-row">
                                <label class="form-label mt-3">
                                    <span>عکس کاربری</span>
                                </label>
                                <div>
                                    <input type="file" name="picture" id="picture" class="form-control">
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="modal-footer" style="margin-top: 5px;padding-bottom: 0px;">
                                <button type="button" class="btn btn-danger col-sm-3 btn-rounded" onclick="$('#modal_avatar').modal('hide');">انصراف</button>
                                <button type="button" id="upload_avatar_btn" class="btn btn-primary col-sm-4 btn-rounded">آپلود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Avatar Picture Modal -->

    <!-- Start Avatar Picture Modal -->
    <div class="modal fade " id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">تغییر رمزعبور</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa fa-close"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('profile.updatePassword') }}" method="POST">
                            @csrf
                            <div class="fv-row">
                                <label class="form-label mt-3">
                                    <span>رمزعبور قبل</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" name="old_password" id="old_password" class="form-control">
                                    <span class="btn btn-outline-primary show_password"><i class="fa fa-eye-slash"></i></span>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="fv-row">
                                <label class="form-label mt-3">
                                    <span>رمزعبور جدید</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                    <span class="btn btn-outline-primary show_password"><i class="fa fa-eye-slash"></i></span>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="fv-row">
                                <label class="form-label mt-3">
                                    <span>تکرار رمزعبور جدید</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                    <span class="btn btn-outline-primary show_password"><i class="fa fa-eye-slash"></i></span>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="fv-row">
                                <label class="form-label mt-3">
                                    <span>کد امنیتی</span>
                                </label>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2"></div>
                                    <div class="col-md-4 col-sm-4 captcha">
                                        <input type="text" name="captcha" id="input_captcha" class="form-control">
                                        <span id="recaptcha" class="btn btn-outline-primary">
                                            <i class="fa fa-refresh"></i></span> </div>
                                    <div class="col-md-4 col-sm-4 captcha">
                                        <div id="captcha"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-2"></div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-top: 5px;padding-bottom: 0px;">
                                <button type="button" class="btn btn-danger col-sm-3 btn-rounded" onclick="$('#modal_change_password').modal('hide');">انصراف</button>
                                <button type="button" id="change_password_btn" class="btn btn-success col-sm-4 btn-rounded">ویرایش</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Avatar Picture Modal -->

    <!-- slider parallax effect jquery-->
    {{-- <script src="{{asset('/asset/front/abzar/js/parallax-effect.js')}}"></script> --}}

    <!-- latest jquery-->
    <script src="{{ asset('asset/front/abzar/js/jquery-3.3.1.min.js') }}"></script>

    <!-- menu js-->
    <script src="{{ asset('asset/front/abzar/js/menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('asset/front/abzar/js/lazysizes.min.js') }}"></script>

    <!-- slick js-->
    <script src="{{ asset('asset/front/abzar/js/slick.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('asset/front/abzar/js/bootstrap.bundle.min.js') }}"></script>

    <!-- timer js-->
    {{-- <script src="{{asset('asset/front/abzar/js/timer.js')}}"></script> --}}

    <!-- Bootstrap Notification js-->
    <script src="{{ asset('asset/front/abzar/js/bootstrap-notify.min.js') }}"></script>

    <!-- Zoom js-->
    <script src="{{ asset('asset/front/abzar/js/jquery.elevatezoom.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('/asset/front/abzar/js/script.js') }}"></script>
    <script>
        let add_product_favorite_url = "{{ route('addProductToFavorites') }}";

    </script>
    @yield('scripts')
    <script src="{{ asset('/asset/front/abzar/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/asset/front/abzar/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('asset/front/abzar/js/custom/toastr.min.js') }}"></script>
    <script src="{{ asset('asset/front/abzar/js/custom/profile.js') }}"></script>

    <script>
        @if(Session::exists('status'))
        Swal.fire({
            html: `{{ Session::get('status')['message'] }}`
            , icon: @if(Session::pull('status')['status'] == 200)
            "success"
            @else "error"
            @endif
            , buttonsStyling: false
            , showCancelButton: true
            , showConfirmButton: false
            , cancelButtonText: "باشه"
            , customClass: {
                cancelButton: "btn btn-primary"
            , }
        });
        @endif

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }

    </script>
</body>

</html>
