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
        border-color: red !important;
        color: red !important;
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
                    <i class="fas fa-business-time"></i>
                </span>
                <!--end::Svg Icon-->
                <h2>ویرایش فروشگاه جدید</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            @if(\Illuminate\Support\Facades\Session::exists('status'))
            <div class="alert @if(\Illuminate\Support\Facades\Session::get('status')['status'] == 200) alert-success @else alert-danger @endif">
                {{\Illuminate\Support\Facades\Session::pull('status')['message']}}
            </div>
            @endif

            <!--begin::Form-->
            <form id="addShopForm" class="form" method="post" action="{{route('shop.update',$shop->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input type="hidden" name="manager_mobile" id="manager_mobile" value="{{ $shop->manager->mobile }}">
                <div id="user_create_inputs">
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">مدیرعامل</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="مدیرعامل (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <div class="border rounded">
                                    <select id="kt-manager" class="form-select form-select-transparent" name="manager" data-placeholder="لطفا مدیر کاربر را انتخاب کنید ...">
                                    </select>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">نام فروشگاه</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام فروشگاه (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="name" id="name" value="{{ $shop->name }}" />
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
                                    <span class="required">نوع فروشگاه</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="type" class="form-select form-select-solid lh-1 py-3" name="type" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب نوع فروشگاه">
                                            <option value="0">تجاری</option>
                                            <option value="1">خانگی</option>
                                        </select>
                                        <!--end::انتخاب2-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        {{-- <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">شماره تلفن مدیر</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="شماره تلفن مدیر (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="manager_mobie" value="" />
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div> --}}
                        <div class="col">
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>تلفن ثابت</span>
                                </label>
                                <!--end::Tags-->
                                <input type="text" class="form-control form-control-solid" name="tell" id="tell"
                                    @if(sizeof(json_decode($shop->tell)) > 0 )
                                        value="{{ json_decode($shop->tell)[0] }}"
                                    @endif />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">کدملی مدیر</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="کدملی مدیر (اختیاری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="nationalCode" id="nationalCode" value="{{$shop->manager_natoinalCode}}" />
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
                                    <span class="required">دسته بندی</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="category" class="form-select form-select-solid lh-1 py-3" name="category_id" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب دسته بندی">
                                            <option value="1">فاقد دسته بندی</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if($shop->category_id == $category->id) selected @endif>{{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!--end::انتخاب2-->
                                    </div>
                                </div>
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
                                    <span class="required">دفتر مرکزی</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="center_shop_id" class="form-select form-select-solid lh-1 py-3" name="center_shop_id" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب دفترمرکزی">
                                            <option value="0">فاقد دفترمرکزی</option>
                                            @foreach ($shops as $item)
                                            <option value="{{ $item->id }}"
                                                @if($shop->main_shop_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <!--end::انتخاب2-->
                                    </div>
                                </div>
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
                                    <span class="required">استان</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="state" class="form-select form-select-solid lh-1 py-3" name="state_id" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب استان">
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                @if($state->id == $shop->city->parent_id) selected @endif>{{ $state->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!--end::انتخاب2-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
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
                                    <span class="required">شهر</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <select id="city" class="form-select form-select-solid lh-1 py-3" name="city_id" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب شهر">

                                        </select>
                                        <!--end::انتخاب2-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
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
                                    <span class="required">تاریخ شروع قرارداد</span>
                                </label>
                                <!--end::Tags-->
                                <span class="form-control form-control-solid" id="start_date"
                                    data-gdate="{{$shop->start_contract_date}}">{{ verta($shop->start_contract_date) }}</span>
                                <span id="start_dateSpan"></span>
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
                                    <span class="required">تاریخ پایان قرارداد</span>
                                </label>
                                <!--end::Tags-->
                                <span class="form-control form-control-solid" id="end_date"
                                    data-gdate="{{$shop->end_contract_date}}">{{ verta($shop->end_contract_date) }}</span>
                                <span id="end_dateSpan"></span>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div id="dateError" class="fv-plugins-message-container invalid-feedback"></div>
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
                                    <span class="required">آدرس</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <textarea class="form-control form-control-solid" name="address" id="address" rows="4">@if(sizeof(json_decode($shop->addresses)) > 0) {{ trim(json_decode($shop->addresses , true)[0]['address']) }} @endif</textarea>
                                        <!--end::انتخاب2-->
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            {{-- <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">تلفن ثابت</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <input type="text" class="form-control form-control-solid" name="tell" value="" />
                                    </div>
                                </div>
                            </div> --}}
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1">
                        <!--begin::Col-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 hours-of-work">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">ساعت کاری</span>
                            </label>
                            <div class="col" id="hoursOfWork">
                                <div class="row" id="day_0">
                                    <div class="col-1" style="align-self: center;color:red !important;">
                                        <i class="fas fa-user-clock" style="color: red;"></i>
                                        <span>شنبه</span></div>
                                    <div class="col-5">
                                        <span>شیفت صبح از : </span>
                                        <input type="time" class="form-control" name="morning_at[0][]" id="morning_at">
                                        <span> تا : </span>
                                        <input type="time" class="form-control" name="morning_to[0][]" id="morning_to">
                                    </div>
                                    <div class="col-6">
                                        <span>شیفت عصر از : </span>
                                        <input type="time" class="form-control" name="afternoon_at[0][]" id="afternoon_at">
                                        <span> تا : </span>
                                        <input type="time" class="form-control" name="afternoon_to[0][]" id="afternoon_to">
                                        <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="0" style="float: left;margin-left:10px">
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                            <span class="pulse-ring ms-n1"></span>
                                            <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                        </label>
                                    </div>
                                </div>
                                <div id="days" style="display: none">
                                    <div class="row" id="day_1">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>یکشنبه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[1][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[1][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[1][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[1][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="1" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="day_2">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>دوشنبه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[2][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[2][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[2][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[2][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="2" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="day_3">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>سه شنبه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[3][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[3][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[3][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[3][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="3" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="day_4">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>چهارشنبه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[4][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[4][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[4][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[4][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="4" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="day_5">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>پنجشنبه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[5][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[5][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[5][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[5][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="5" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="day_6">
                                        <div class="col-1" style="align-self: center;color:red !important;">
                                            <i class="fas fa-user-clock" style="color: red;"></i>
                                            <span>جمعه</span></div>
                                        <div class="col-5">
                                            <span>شیفت صبح از : </span>
                                            <input type="time" class="form-control" name="morning_at[6][]" id="morning_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="morning_to[6][]" id="morning_to">
                                        </div>
                                        <div class="col-6">
                                            <span>شیفت عصر از : </span>
                                            <input type="time" class="form-control" name="afternoon_at[6][]" id="afternoon_at">
                                            <span> تا : </span>
                                            <input type="time" class="form-control" name="afternoon_to[6][]" id="afternoon_to">
                                            <label class="closed btn form-check form-switch form-check-custom form-check-solid pulse pulse-success" data-day="6" style="float: left;margin-left:10px">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode">
                                                <span class="pulse-ring ms-n1"></span>
                                                <span class="form-check-label text-gray-600 fs-7">تعطیل</span>
                                            </label>
                                            {{-- <span class="btn btn-info btn-rounded closed" data-day="6" style="float: left;margin-left:10px">
                                                تعطیل
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: center;margin-top: 25px;border-radius: 10px;border-bottom: 1px solid;">
                                    <button id="show_days" type="button" class="btn btn-danger btn-circle">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <p>نمایش بیشتر</p>
                                </div>
                            </div>
                            <!--end::Tags-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row row-cols-1">
                        <!--begin::Col-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">فایل قرارداد</span>
                                <span class="text-danger" style="margin-right: 2rem;">پسوند فایل قرارداد pdf میباشد.</span>
                            </label>
                            <input type="file" name="contract" class="form-control" id="contract">
                            <!--end::Tags-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">تصویر لوگو</span>
                                <span class="text-danger" style="margin-right: 2rem;">پسوند تصویر لوگو (jpg , jpeg , png) میباشد.</span>
                            </label>
                            <input type="file" name="logo" class="form-control" id="logo">
                            <!--end::Tags-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>تصویر مدیر فروشگاه</span>
                            </label>
                            <input type="file" name="profile" class="form-control" id="profile">
                            <!--end::Tags-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7" id="lisence">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">فایل پروانه کسب</span>
                                <span class="text-danger" style="margin-right: 2rem;">پسوند فایل پروانه کسب pdf میباشد.</span>
                            </label>
                            <input type="file" name="license" class="form-control" id="license">
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
                        <a href="{{route('user.index')}}">
                            <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <input type="hidden" name="start_date" id="input_start_date" value="{{ $shop->start_contract_date }}">
                        <input type="hidden" name="end_date" id="input_end_date" value="{{ $shop->end_contract_date }}">
                        <button id="btn_addShop" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
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
<script src="{{ asset('asset/back/metronic/js/customize/cities.js') }}"></script>
<script>
    let isAdmin = 1;
    let isEdit = true;
    let token = "{{ csrf_token() }}";
    let getCitiesUrl = "{{ route('cities') }}";
    let userPicPath = "{{ asset('image/users').'/' }}";
    let userSearchUrl = "{{ route('users.search') }}";
    let selectedManager = [{"id":"{{ $shop->id }}","name":"{{ $shop->manager->getFullname() }}","selected":true}];
    getCities("{{ $shop->city_id }}");
</script>
<script src="{{ asset('asset/back/metronic/js/customize/validate/shop.create.js') }}"></script>
<script src="{{ asset('asset/back/metronic/js/customize/validate/shop.edit.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#type').val("{{ $shop->shopType }}").trigger('change');
        $('#hoursOfWork').find('input[type=checkbox]').click();
        var businessDays = [];
        @foreach (json_decode($shop->hoursOfWork , true) as $key => $item)
            businessDays.push({{ $key }});
            $('#day_'+{{ $key }}).find('input[type=checkbox]').click();
            $('#day_'+{{ $key }}).find('#morning_at').val("{{ $item['morning_at'] }}");
            $('#day_'+{{ $key }}).find('#morning_to').val("{{ $item['morning_to'] }}");
            $('#day_'+{{ $key }}).find('#afternoon_at').val("{{ $item['afternoon_at'] }}");
            $('#day_'+{{ $key }}).find('#afternoon_to').val("{{ $item['afternoon_to'] }}");
        @endforeach
        // for (let index = 0; index < 7; index++) {
        //     if($.inArray(index , businessDays) == -1)
        //         $('#day_'+index).find('input[type=checkbox]').click();
        // }
    });
</script>
@endsection
