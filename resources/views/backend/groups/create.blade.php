@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('asset/back/assets/css/custom/style.css')}}">
<link href="{{ asset('asset/back/assets/css/persianDatepicker-default.css') }}" rel="stylesheet" />

<style>
    .hours-of-work input {
        display: inline-block;
        max-width: 130px;
        text-align: center;
    }

    #hoursOfWork .row {
        margin-top: 10px;
    }

    .btn-circle {
        margin: 10px 0;
        border-radius: 40px;
        width: 40px;
        height: 40px;
        padding: 10px 9px 6px 4px !important;
    }

    input[type="time"] {
        -webkit-transition: background 1s ease;
        -moz-transition: background 1s ease;
        -o-transition: background 1s ease;
        -ms-transition: background 1s ease;
        transition: background 1s ease;
    }

    .err_class {
        border-color: red;
        color: red;
    }

    .btn .la {
        font-size: 1.8rem;
    }

    .input-group-append {
        height: 100%;
    }

</style>
<div class="container">
    <!--begin::مخاطبین-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                <span class="svg-icon svg-icon-1 me-2">
                    <i class="fas fa-user-plus"></i>
                </span>
                <!--end::Svg Icon-->
                <h2>افزودن گروه جدید</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            @if($errors->any())
            <div>
                <ul class="list-group">
                    {!! implode('', $errors->all('<li class="list-group-item list-group-item-danger">:message</li>'))
                    !!}
                </ul>
            </div>
            @else
            @if (\Illuminate\Support\Facades\Session::exists('status'))
            <div class="alert @if (\Illuminate\Support\Facades\Session::get('status')['status'] == 200) alert-success @else alert-danger @endif">
                {{ \Illuminate\Support\Facades\Session::pull('status')['message'] }}
            </div>
            @endif
            @endif
            <!--begin::Form-->
            <form id="addGroupForm" class="form" method="post" action="{{route('group.store')}}" enctype="multipart/form-data">
                @csrf
                <div id="user_create_inputs">
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">نام گروه</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام گروه (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="title" id="title" value="" />
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">نوع</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="type" name="isGroup" class="form-select form-select-solid lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب نوع">
                                            <option value="1">گروه</option>
                                            <option value="0">کانال</option>
                                        </select>
                                        <!--end::انتخاب2-->
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">نام یونیک</span>
                                </label>
                                <!--end::Tags-->
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="unique_name" id="unique_name" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="check_unique_name">
                                            <span>بررسی</span>
                                            <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display: none"></span>
                                            {{-- <i class="la la-check"></i> --}}
                                        </button>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>توضیحات</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="توضیحات (اختیاری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-solid" name="description" id="description"></textarea>
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1">
                        <!--begin::Col-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">تصویر</span>
                                <span class="text-danger" style="margin-right: 2rem;">پسوند تصویر لوگو (jpg , jpeg ,
                                    png) میباشد.</span>
                            </label>
                            <input type="file" name="pic" class="form-control" id="pic">
                            <!--end::Tags-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::عملیات buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('group.index')}}">
                            <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button id="btn_addGroup" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره</span>
                            <span class="indicator-progress">لطفا صبر کنید...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::عملیات buttons-->
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::مخاطبین-->
</div>
<!--end::Content-->

@endsection
@section('addScript')
<!--  Script for ME  -->
<script>
    let isAdmin = 1;
    let token = "{{ csrf_token() }}";
    var checkUniqueNameUrl = "{{ route('group.checkUniqueName') }}";
    var group_id = 0;
    main_id = 2, sub_id = 0;

</script>
<script src="{{ asset('asset/back/metronic/js/customize/validate/group.create.js') }}"></script>
@endsection
