@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/back/assets/css/custom/style.css') }}">
<link href="{{ asset('asset/back/assets/css/persianDatepicker-default.css') }}" rel="stylesheet" />

<style>
    .btn-outline-primary,
    .btn-primary {
        border: 1px solid #009ef7 !important;
        border-radius: 0 !important;
    }

    .btn-outline-success {
        border: 1px solid #50cd89 !important;
    }

    input#discount {
        background-color: #eef3f7;
        border-radius: 0px 5px 5px 0px;
    }

    input[type=time] {
        text-align: center;
    }

    .spinner {
        display: none;
    }

    .entity {
        opacity: 50%;
    }

    .for {
        opacity: 50%;
    }

    .list-group-item {
        margin: 2px 0px 2px 0px;
        border-radius: 5px;
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
                <h2>افزودن تخفیف جدید</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            @if($errors->any())
            <div>
                <ul class="list-group">
                    {!! implode('', $errors->all('<li class="list-group-item list-group-item-danger">:message</li>')) !!}
                </ul>
            </div>
            @else
            @if (\Illuminate\Support\Facades\Session::exists('status'))
            @if (\Illuminate\Support\Facades\Session::get('status')['status'] == 200)
            <div class="alert alert-success">
                {{ \Illuminate\Support\Facades\Session::pull('status')['message'] }}
            </div>
            @endif
            @endif
            @endif

            <!--begin::Form-->
            <form id="addDiscountForm" class="form" method="post" action="{{ route('discount.update' , $discount->id) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="isPercentage" value="1" />
                <div id="user_create_inputs">
                    <div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4">
                        <!--begin::Col-->
                        <div class="col-3 entity">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="entity" id="check" value="0">
                                    <span>فروشگاه</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <select id="shop_id" name="shop_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب فروشگاه">
                                    {{-- @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach --}}
                                </select>
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-3 entity">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="entity" id="check" value="1">
                                    <span>کالا</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::انتخاب2-->
                                <select id="shop_product_id" name="shop_product_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب محصول">
                                </select>
                                <!--end::انتخاب2-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-3 entity">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="entity" id="check" value="2">
                                    <span>دسته بندی</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::انتخاب2-->
                                <select id="category_id" name="category_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب دسته بندی">
                                </select>
                                <!--end::انتخاب2-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Col-->
                        <div class="col-3 entity">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="entity" id="check" value="3">
                                    <span>برند</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::انتخاب2-->
                                <select id="brand_id" name="brand_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب برند">
                                </select>
                                <!--end::انتخاب2-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col for" style="opacity: 100%;">
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="for" id="for" value="0">
                                    <span>گروه کاربری</span>
                                </label>
                                <!--end::Tags-->
                                <select id="group_id" name="group_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب گروه کاربری">
                                    {{-- @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                                    @endforeach --}}
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col for">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <input type="radio" name="for" id="for" value="1">
                                    <span>کاربر</span>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <select id="user_id" name="user_id" class="form-select form-select-solid lh-1 py-3 form-control" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب کاربر خاص">
                                </select>
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">میزان تخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" id="discount" name="discount" placeholder="درصد تخفیف را وارد کنید ..." value="{{ old('discount') }}">
                                    <span id="percentage" class="input-group-text btn btn-primary">درصد</span>
                                    <span id="price" class="input-group-text btn btn-outline-success">ریال</span>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">کدتخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" id="code" name="code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ old('code' , $discount->discount_code) }}">
                                    <span class="input-group-text btn btn-info" id="generateCode">
                                        <span class="text">تولید کد</span>
                                        <span class=" spinner spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <span class="input-group-text btn btn-primary" id="validateCode">
                                        <span class="text">بررسی</span>
                                        <span class=" spinner spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-4 rol-cols-md-1 row-cols-lg-4">
                        <!--begin::Col-->
                        <div class="col-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">تاریخ شروع تخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <span class="form-control form-control-solid" id="start_date">{{ old('end_date' , substr($discount->getStartDate() , 0,10)) }}&nbsp;</span>
                                <span id="start_dateSpan"></span>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">ساعت شروع تخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <input type="time" class="form-control form-control-solid" name="start_time" id="start_time" value="{{ old('start_time' , substr($discount->start_date , 11,5)) }}" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">تاریخ پایان تخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <span class="form-control form-control-solid" id="end_date">{{ old('end_date' , substr($discount->getEndDate() , 0,10) ) }}&nbsp;</span>
                                <span id="end_dateSpan"></span>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">ساعت پایان تخفیف</span>
                                </label>
                                <!--end::Tags-->
                                <input class="form-control form-control-solid" id="end_time" name="end_time" type="time" value="{{ old('end_time' , substr($discount->end_date , 11,5)) }}" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>

                                {{-- <input type="time" class="form-control form-control-solid" name="end_time" id="end_time" pattern="[0-9]{2}:[0-9]{2}"> --}}
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <input type="hidden" name="input_start_date" value="{{ old('start_date' , $discount->start_date) }}">
                    <input type="hidden" name="input_end_date" value="{{ old('end_date' , $discount->end_date) }}">
                    <!--begin::عملیات buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('discount.index') }}">
                            <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <input type="hidden" name="start_date" id="input_start_date" value="{{ substr($discount->start_date,0,10) }}">
                        <input type="hidden" name="end_date" id="input_end_date" value="{{ substr($discount->end_date,0,10) }}">
                        <button id="btn_addDiscount" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
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
<script src="{{ asset('asset/back/assets/js/datepicker/persian/persianDatepicker.min.js') }}"></script>
<script>
    let isAdmin = 1;
    let token = "{{ csrf_token() }}";
    let validateDiscountCode = "{{ route('validateCode') }}";
    let generateDiscountCode = "{{ route('generateCode') }}";
    let getShopsUrl = " {{ route('getShops') }}";
    let getShopProductsUrl = " {{ route('getShopProducts') }}";
    let getCategoriesUrl = " {{ route('getCategories') }}";
    let getBrandsUrl = " {{ route('getBrands') }}";
    let getGroupsUrl = " {{ route('getGroups') }}";
    let getUsersUrl = " {{ route('getCustommers') }}";
    let entityID = "{{ $entityType }}";
    let forID = "{{ $forType }}";
    let discount_id = "{{$discount->id}}"

</script>
<script src="{{ asset('asset/back/metronic/js/customize/validate/discount.create.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#' + entityID).parent().parent().css('opacity', '100%');
        $('#' + entityID).parent().find('label > input[type=radio]').prop('checked', true);

        $('#' + forID).parent().parent().css('opacity', '100%');
        $('#' + forID).parent().find('label > input[type=radio]').prop('checked', true);

        @if($entityType == 'shop_product_id')
        @foreach($entity as $item)
        $('#' + entityID).append(`<option value="{{ $item->id }}">
                                {{ $item->product->name }}
                            </option>`);
        @endforeach
        @else
        @foreach($entity as $item)
        $('#' + entityID).append(`<option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>`);
        @endforeach
        @endif

        @if($forType == 'user_id')
        @foreach($for as $item)
        $('#' + forID).append(`<option value="{{ $item->id }}">
                                {{ $item->getFullName().' - '.$item->mobile }}
                            </option>`);
        @endforeach
        @elseif($forType == 'group_id')
        @foreach($for as $item)
        $('#' + forID).append(`<option value="{{ $item->id }}">
                                {{ $item->title }}
                            </option>`);
        @endforeach
        @endif

        var percentage = "{{ $discount->discount_percentage }}";
        var price = "{{ $discount->discount_price }}";

        if (price == 0) {
            $('#percentage').click();
            $('#discount').val(percentage);
        } else if (percentage == 0) {
            $('#price').click();
            let prc = price.replace(/,/g, "");
            if (prc.length > 3)
                $('#discount').val(Number(prc).toLocaleString());
            else
                $('#discount').val(prc);
        }
    });

</script>

{{-- <script src="{{ asset('asset/back/metronic/js/customize/validate/shop.create.js') }}"></script> --}}
@endsection
