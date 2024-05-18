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
                        <li class="breadcrumb-item active">درباره ما</li>
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about_mainHeader">
                        <img src="{{ asset('image/icons/logo.png') }}" alt="">
                        <h3>فروشگاه اینترنتی سیتو</h3>
                    </div>
                </div>
                <div class="col-sm-12 about_body">
                    <h3>سیتو ، فروشگاهی برای تو</h3>
                    <p>
                        خب خب خب! به دنیایی از جلوه های شگفت انگیز و اسرارآمیز خوش آمدید، جایی که دکوراسیون خونه ها از تلویزیون‌شون قشنگ‌تر و جذاب‌تره!
                    </p>
                    <p>
                        سیتو فروشگاهی هست برای تو! ما در سیتواستور مدرن‌ترین و قشنگ‌ترین لوازم‌خانگی و دکوری رو برای شما میاریم. دنبال یک تابلو متفاوت برای اتاق خوابت هستی؟ یا شاید یک مجسمه خیلی خاص که باعث جذب انرژی مثبت بشه؟ حتی می‌تونید انواع ماگ و فلاسک‌های فانتزی از ما بخواهید!
                    </p>
                    <p>
                        ما تضمین می‌کنیم که هرکدام از محصولات ما 100% جدید و مدرن و شگفت‌انگیزه! بروزترین لوازم‌خانگی تا ترکیبات چوبی دکوراتیو، فقط در سیتواستور موجوده. حتی اگر یک روز منزل شما به شکل یک خونه با تم رنگی خاص تبدیل شد، از ما خواهید خواست که به شما کمک کنیم منزل خیالی خودتون رو بازسازی کنید!
                    </p>
                    <p>
                        پس معطل چی هستید؟ از این لوازم خونه خیالی دیدن کنید و برای دکوراسیون متفاوت منزل‌تون ایده بگیرید.از ما هرروز یک ظرف و وسیله متفاوت میرسه، همونطور که میگن "سیتو فروشگاهی برای تو"
                    </p>
                </div>
            </div>
            <div class="row section-b-space">
                <div class="contact-right">
                    <ul>
                        <li>
                            <div class="contact-icon">
                                <img class="about-icon" src="{{ asset('image/icons/phone-call.png') }}">
                                <span class="heder_about">تماس با ما : </span>
                                <span class="body_about">0656 740 0915</span>
                            </div>
                        </li>
                        {{-- <li>
                            <div class="contact-icon">
                                <img class="about-icon" src="{{ asset('image/icons/location.png') }}">
                                <span class="heder_about">آدرس : </span>
                                <span class="body_about">خراسان جنوبی ، بیرجند ، بلوار معلم ، خیابان فردوسی ، پلاک 1 ،
                                    طبقه سوم </span>
                            </div>
                        </li> --}}
                        <li>
                            <div class="contact-icon">
                                <img class="about-icon" src="{{ asset('image/icons/email.png') }}">
                                <span class="heder_about">ایمیل : </span>
                                <span class="body_about">info@ctostore.ir</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('scripts')
<script>
    let token = "{{ csrf_token() }}";
    let delete_cart_item_link = "{{ route('deleteFromCart') }}";

</script>
<script src="{{ asset('/asset/front/abzar/js/custom/cart.js') }}"></script>
@endsection
