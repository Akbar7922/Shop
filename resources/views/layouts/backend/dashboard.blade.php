<!DOCTYPE html>
<!--
نویسنده: ساتراس وب
محصولات نام: مترونیک - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin داشبورد Theme
خرید: https://1.envato.market/EA4JP
وب سایت: http://www.keenthemes.com
تماس با ما: support@keenthemes.com
دنبال کردن: www.twitter.com/keenthemes
دریبل: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
لاینسس شده: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
    <base href="../../">
    <title>داشبورد مدیریت </title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced پنل ادمین بوت استراپ Theme on Themeforest trusted by 94,000 beginners و professionals. Multi-demo, حالت تیره, RTL support و complete React, Angular, Vue &amp; Laravel versions. Grab your copy now و get life-time updates for free." />
    <meta name="keywords" content="مترونیک, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="قالب مدیریت مترونیک" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="ساتراس وب | مترونیک" />
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('image/icons/baner2.png') }}" />
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('asset/back/metronic/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('asset/back/metronic/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/back/metronic/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .is-invalid {
            border-color: red !important;
        }
    </style>
    @livewireStyles()
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::کناری-->
            <div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brو-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="">
                        <img alt="Logo" src="{{ asset('asset/back/metronic/media/logos/logo-1.svg') }}" class="h-25px logo" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::کناری toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                                <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::کناری toggler-->
                </div>
                <!--end::Brو-->
                <!--begin::کناری menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::کناری Menu-->
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <!--begin::Menu-->
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expو="false">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">داشبورد ها</span>
                                </span>
                            </div>
                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">امکانات پنل مدیریت</span>
                                </div>
                            </div>
                            <div data-key="0" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-sliders-h"></span>
                                    </span>
                                    <span class="menu-title">تبلیغات اسلایدر</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item" data-key="0">
                                        <a class="menu-link" href="{{ route('advertising.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus-circle"></span>
                                            </span>
                                            <span class="menu-title">افزودن اسلایدر</span>
                                        </a>
                                    </div>
                                    <div class="menu-item" data-key="1">
                                        <a class="menu-link" href="{{ route('advertising.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست تبلیغات اسلایدر</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="1" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-users"></span>
                                    </span>
                                    <span class="menu-title">کاربران</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('user.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-user-plus"></span>
                                            </span>
                                            <span class="menu-title">افزودن کاربر</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('user.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-users-cog"></span>
                                            </span>
                                            <span class="menu-title">لیست کاربران</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="2" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-users"></span>
                                    </span>
                                    <span class="menu-title">گروه های کاربری</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('group.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus-circle"></span>
                                            </span>
                                            <span class="menu-title">افزودن گروه</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('group.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست گروه ها</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="3" class="menu-item menu-accordion">
                                <a href="{{ route('brand.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-list-alt"></span>
                                    </span>
                                    <span class="menu-title">برندها</span>
                                </a>
                            </div>
                            <div data-key="4" class="menu-item menu-accordion">
                                <a href="{{ route('category.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z" fill="currentColor" /></svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">دسته بندی ها</span>
                                </a>
                            </div>
                            <div data-key="5" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g>
                                                    <polygon points="27.75,9.652 27.75,1.304 20.38,1.304 20.38,9.652 15.245,9.652 24.278,19.174 32.886,9.652  " fill="currentColor" />
                                                    <polygon points="24.978,26.805 24.978,46.695 24.979,46.695 40.75,46.695 40.75,45.391 40.75,26.805 24.979,26.805  " fill="currentColor" />
                                                    <polygon points="7.25,26.805 7.25,46.695 7.25,46.695 23.021,46.695 23.021,45.391 23.021,26.805 7.25,26.805  " fill="currentColor" />
                                                    <polygon points="40.714,24.326 48,16.129 32.151,16.129 24.978,24.327 24.979,24.326  " fill="currentColor" />
                                                    <polygon points="0,16.129 7.286,24.326 23.021,24.326 23.022,24.326 15.849,16.129  " fill="currentColor" />
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="menu-title">محصولات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('product.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus"></span>
                                            </span>
                                            <span class="menu-title">افزودن محصول</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('product.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست محصولات</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="6" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-store-alt"></span>
                                    </span>
                                    <span class="menu-title">فروشگاه ها</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('shop.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus-circle"></span>
                                            </span>
                                            <span class="menu-title">افزودن فروشگاه</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('shop.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست فروشگاه ها</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="7" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-shopping-cart"></span>
                                    </span>
                                    <span class="menu-title">کالاهای فروشگاه</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('shopProduct.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus-circle"></span>
                                            </span>
                                            <span class="menu-title">افزودن کالا</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('shopProduct.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست کالاها</span>
                                        </a>
                                    </div>
                                    {{-- <div data-key="2" class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">گزارشات کالاها</span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div data-key="8" class="menu-item menu-accordion">
                                <a href="{{ route('order.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-shopping-basket"></span>
                                    </span>
                                    <span class="menu-title">سفارشات</span>
                                </a>
                            </div>
                            <div data-key="9" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-tags"></span>
                                    </span>
                                    <span class="menu-title">تخفیفات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a href="{{ route('discount.create') }}" class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-tag"></span>
                                            </span>
                                            <span class="menu-title">افزودن تخفیف</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a href="{{ route('discount.index') }}" class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست تخفیفات</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="10" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-sms"></span>
                                    </span>
                                    <span class="menu-title">پیام ها</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('ticket.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-ticket-alt"></span>
                                            </span>
                                            <span class="menu-title">پیام های پشتیبانی</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-sms"></span>
                                            </span>
                                            <span class="menu-title">چت روم</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="11" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-comments"></span>
                                    </span>
                                    <span class="menu-title">کامنت ها</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('comment.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-comments"></span>
                                            </span>
                                            <span class="menu-title">لیست کامنت ها</span>
                                        </a>
                                    </div>
                                    {{-- <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-commenting"></span>
                                            </span>
                                            <span class="menu-title">گزارش کامنت ها</span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div data-key="12" class="menu-item menu-accordion">
                                <a href="{{ route('cooperation.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-people-arrows"></span>
                                    </span>
                                    <span class="menu-title">درخواست های همکاری</span>
                                </a>
                            </div>
                            <div data-key="13" class="menu-item menu-accordion">
                                <a href="{{ route('job.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-certificate"></span>
                                    </span>
                                    <span class="menu-title">مشاغل</span>
                                </a>
                            </div>
                            <div data-key="14" class="menu-item menu-accordion">
                                <a href="{{ route('gallery.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-images"></span>
                                    </span>
                                    <span class="menu-title">گالری</span>
                                </a>
                            </div>
                            <div data-key="15" class="menu-item menu-accordion">
                                <a href="{{ route('video.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-video"></span>
                                    </span>
                                    <span class="menu-title">ویدیوها</span>
                                </a>
                            </div>
                            <div data-key="16" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-newspaper"></span>
                                    </span>
                                    <span class="menu-title">اخبار و رویدادها</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{ route('event.create') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-plus-circle"></span>
                                            </span>
                                            <span class="menu-title">افزودن اخبار/ رویداد جدید</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="{{ route('event.index') }}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-list"></span>
                                            </span>
                                            <span class="menu-title">لیست اخبار و رویدادها</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="17" class="menu-item menu-accordion">
                                <a href="{{ route('project.index') }}" class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-project-diagram"></span>
                                    </span>
                                    <span class="menu-title">پروژه ها</span>
                                </a>
                            </div>
                            <div data-key="18" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-chart-bar"></span>
                                    </span>
                                    <span class="menu-title">گزارشات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-money-bill-wave"></span>
                                            </span>
                                            <span class="menu-title">گزارشات مالی</span>
                                        </a>
                                    </div>
                                    <div data-key="1" class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-chart-line"></span>
                                            </span>
                                            <span class="menu-title">گزارشات CRM</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-key="19" data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <span class="fas fa-list"></span>
                                    </span>
                                    <span class="menu-title">تنظیمات</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-key="0" class="menu-item">
                                        <a class="menu-link" href="{{route('config')}}">
                                            <span class="menu-bullet"></span>
                                            <span class="menu-icon">
                                                <span class="fas fa-money"></span>
                                            </span>
                                            <span class="menu-title">تنظیمات اولیه سایت</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::کناری Menu-->
                </div>
                <!--end::کناری menu-->
            </div>
            <!--end::کناری-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::کناری mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="مشاهده aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
                                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::کناری mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo1/dist/index.html" class="d-lg-none">
                                <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                {{-- <div class="d-flex align-items-center ms-1 ms-lg-3">
                                    <!--begin::Theme mode docs-->
                                    <span class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px">
                                        <i class="fonticon-sun fs-2"></i>
                                    </span>
                                    <!--end::Theme mode docs-->
                                </div> --}}
                                <!--end::Theme mode-->
                                <!--begin::کاربر menu-->
                                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <img src="{{ asset('image/users/' . Auth::user()->pic) }}" alt="user" />
                                    </div>
                                    <!--begin::کاربر account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo" src="{{ asset('image/users/' . Auth::user()->pic) }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::کاربرname-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->getFullName() }}
                                                    </div>
                                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->mobile }}</a>
                                                </div>
                                                <!--end::کاربرname-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        {{-- <div class="menu-item px-5">
                                            <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">پروفایل
                                                من</a>
                                        </div>
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">سفارشات
                                                من</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
                                                <span class="menu-text">سبد خربد</span>
                                                <span class="menu-badge">
                                                    <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-5">
                                            <span class="menu-link px-5">
                                                وب سایت
                                            </span>
                                        </div> --}}
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5" onclick="$(this).find('form').submit();">
                                            <form method="post" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="menu-link px-5">خروج</a>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <div class="menu-content px-5">
                                                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" />
                                                    <span class="pulse-ring ms-n1"></span>
                                                    <span class="form-check-label text-gray-600 fs-7">باز بودن</span>
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::کاربر account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::کاربر menu-->
                                <!--begin::Header menu toggle-->
                                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="مشاهده header menu">
                                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="currentColor" />
                                                <path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Header menu toggle-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                @yield('content')
                <!--end::Content-->
                <!--begin::Footer-->
                {{-- <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2022©</span>
                            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">ساتراس
                                وب</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">درباره ی
                                    ما</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://rtl-theme.com" target="_blank" class="menu-link px-2">پشتیبانی</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://www.rtl-theme.com/metronic-admin-html-template/" target="_blank" class="menu-link px-2">خرید</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div> --}}
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Modals-->

    <!--end::Modals-->
    <!--begin::Javascript-->
    @livewireScripts()
    <script>
        let hostUrl = "assets/";

    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('asset/back/metronic/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('asset/back/metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page سفارشی Javascript(used by this page)-->
    @yield('addScript')
    <script src="{{ asset('asset/back/metronic/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/custom/utilities/modals/users-search.js') }}"></script>
    <script>
        var main_id = -1
            , sub_id = -1;

    </script>
    <!--end::Page custom Javascript-->
    <!--end::Javascript-->
    @yield('script')
    @yield('additionalScript')
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

        $(document).ready(function() {
            var main_item = $('div.menu-accordion[data-key=' + main_id + ']');
            main_item.addClass('show hover');
            if (sub_id != -1)
                main_item.find('div.menu-item[data-key=' + sub_id + ']').addClass('show hover');
        });

    </script>
</body>
<!--end::Body-->

</html>
