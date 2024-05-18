<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    {{--    <link rel="icon" href="{{asset('asset/back/assets/images/dashboard/favicon.png')}}" type="image/x-icon"> --}}
    {{--    <link rel="shortcut icon" href="{{asset('asset/back/assets/images/dashboard/favicon.png')}}" type="image/x-icon"> --}}
    <title>ورود به بخواه</title>

    <!-- Google font-->

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/vendors/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/vendors/themify-icons.css') }}">

    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/vendors/slick-theme.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/front/abzar/css/toastr.min.css') }}">

    <style>
        .forget-header {
            padding: 12px;
            margin: 10px 5px 5px 5px;
            border-bottom: 1px solid #ced4da;
        }
    </style>

</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 p-0 card-left">
                        <div class="card bg-primary">
                            <div class="svg-icon">
                                <img src="{{ asset('image/icons/store.png') }}" width="80px" alt="" />
                            </div>

                            <div class="single-item">
                                <div>
                                    <div>
                                        <h3>بخواه مارکت</h3>
                                        <p style="margin-top: 1rem;">
                                            سامانه آنلاین فروش مواد خوراکی متنوع
                                        </p>
                                        <p>
                                            هایپرمارکت را به خانه خود بیاورید.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h3>بخواه مارکت</h3>
                                        <p style="margin-top: 1rem;">
                                            سامانه آنلاین فروش مواد خوراکی متنوع
                                        </p>
                                        <p>
                                            هایپرمارکت را به خانه خود بیاورید.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h3>بخواه مارکت</h3>
                                        <p style="margin-top: 1rem;">
                                            سامانه آنلاین فروش مواد خوراکی متنوع
                                        </p>
                                        <p>
                                            هایپرمارکت را به خانه خود بیاورید.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-0 card-right">
                        <div class="card tab2-card card-login">
                            <div class="forget-header">
                                <h4>فراموشی رمزعبور</h4>
                            </div>
                            <div class="card-body">
                                <div id="top-contact">
                                    @csrf
                                    <div class="form-group">
                                        <input required="" name="mobile" type="email" class="form-control"
                                            placeholder="شماره موبایل" id="mobile_register">
                                        <span class="error_input" id="mobileErrorRegister"></span>
                                    </div>
                                    <div class="form-group">
                                        <button id="sendCode" data-link="{{ route('forget.sendCode') }}"
                                            class="btn btn-primary-gradien" type="button">
                                            ارسال کد اعتبارسنجی
                                        </button>
                                        <div class="code_timer">
                                            <div id="timer"></div>
                                        </div>
                                    </div>
                                    <span class="error_input" id="codeError"></span>
                                    <div id="activationDiv" class="form-terms">
                                        <input type="hidden" name="code" />
                                        <input disabled required="" maxlength="1" id="4"
                                            name="activationCode[]" type="text"
                                            class="form-control activationCode_item" />
                                        <input disabled required="" maxlength="1" id="3"
                                            name="activationCode[]" type="text"
                                            class="form-control activationCode_item" />
                                        <input disabled required="" maxlength="1" id="2"
                                            name="activationCode[]" type="text"
                                            class="form-control activationCode_item" />
                                        <input disabled required="" maxlength="1" id="1"
                                            name="activationCode[]" type="text"
                                            class="form-control activationCode_item" />
                                    </div>
                                    <div class="form-button">
                                        <button id="registerBtn" data-link="{{ route('validateCode') }}"
                                            class="btn btn-primary" type="button">بازیابی رمزعبور
                                        </button>
                                        @csrf
                                    </div>
                                    <div class="form-footer">
                                        <span>یا با سیستم عامل های اجتماعی وارد شوید</span>
                                        <ul class="social">
                                            <li><a class="ti-facebook" href=""></a></li>
                                            <li><a class="ti-twitter" href=""></a></li>
                                            <li><a class="ti-instagram" href=""></a></li>
                                            <li><a class="ti-pinterest" href=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="homeBtn" href="{{ route('home') }}" class="btn btn-primary back-btn"><i
                        data-feather="arrow-right"></i>برگشت</a>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">ثبت نام کاربر</h4>
                    <span class="close closeModal">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <form id="forgetForm" action="{{ route('reset.password') }}" method="post">
                        @csrf
                        <input type="hidden" name="mobile" id="mobile_modal">
                        <div class="form-group">
                            <input required="" name="password" type="password" class="form-control"
                                placeholder="رمزعبور جدید" id="password">
                            <span class="error_input" id="passwordError"></span>
                        </div>
                        <div class="form-group">
                            <input required="" name="confirm_password" type="password" class="form-control"
                                placeholder="تکرار رمزعبور جدید" id="confirm_password">
                            <span class="error_input" id="confirm_passwordError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cancel_modal" type="button" class="btn btn-secondary">انصراف</button>
                    <button id="reset_submit" type="button" class="btn btn-primary">تغییر رمزعبور</button>
                </div>
            </div>
        </div>

    </div>

    <!-- latest jquery-->
    <script src="{{ asset('asset/back/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('asset/back/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('asset/back/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('asset/back/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('asset/back/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('asset/back/assets/js/slick.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('asset/back/assets/js/lazysizes.min.js') }}"></script>

    <!--right sidebar js-->
    <script src="{{ asset('asset/back/assets/js/chat-menu.js') }}"></script>

    <!--  Script for ME  -->
    <script src="{{ asset('asset/front/assets/js/countdown/jquery.countdown.js') }}"></script>
    <script src="{{ asset('asset/front/abzar/js/custom/toastr.min.js') }}"></script>
    <script src="{{ asset('asset/back/assets/js/sign.js') }}"></script>
    <script>
        $('#reset_submit').click(function() {
            $('#forgetForm').find('.error_input').fadeOut(500);
            let password = $('#password');
            let confirm_password = $('#confirm_password');
            let validate = true;
            if (!password.val()) {
                $('#passwordError').fadeIn(200);
                $('#passwordError').text('* رمزعبور اجباری است ');
                validate = false;
            } else if (password.val().length < 6) {
                $('#passwordError').fadeIn(200);
                $('#passwordError').text('* رمزعبور حداقل باید 6 کاراکتر باشد ');
                validate = false;
            }
            if (!confirm_password.val()) {
                $('#confirm_passwordError').fadeIn(200);
                $('#confirm_passwordError').text('* تکرار رمزعبور اجباری است ');
                validate = false;
            }
            if (validate) {
                if (password.val() != confirm_password.val()) {
                    $('#confirm_passwordError').fadeIn(200);
                    $('#confirm_passwordError').text('* تکرار رمزعبور صحیح نیست ');
                    validate = false;
                } else {
                    $('#mobile_modal').val($('#mobile_register').val());
                    $('#forgetForm').submit();
                }
            }
        });

        $('.single-item').slick({
            arrows: false,
            dots: true,
            rtl: true
        });
        $(document).ready(function() {

        });
    </script>

</body>

</html>
