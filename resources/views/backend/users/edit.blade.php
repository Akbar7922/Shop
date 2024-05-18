@extends('layouts.backend.dashboard')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/back/assets/css/custom/style.css')}}">

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
                    <h2>افزودن مخاطب جدید</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                @if(\Illuminate\Support\Facades\Session::exists('status'))
                    <div
                        class="alert @if(\Illuminate\Support\Facades\Session::get('status')['status'] == 200) alert-success @else alert-danger @endif">
                        {{\Illuminate\Support\Facades\Session::pull('status')['message']}}
                    </div>
                @endif

                <!--begin::Form-->
                <form id="editUserForm" class="form" method="post" action="{{route('user.update' , $user->id)}}">
                    @csrf
                    @method('PATCH')
                    <div id="user_create_inputs">
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">جنسیت</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="جنسیت (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <br>
                                    <!--begin::رادیو group-->
                                    <div class="btn-group w-25" data-kt-buttons="true"
                                         data-kt-buttons-target="[data-kt-button]">
                                        <!--begin::رادیو-->
                                        <label
                                            class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success @if($user->isMale == 1) active @endif"
                                            data-kt-button="true">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" @if($user->isMale == 1) checked @endif name="gender" value="1"/>
                                            <!--end::Input-->
                                            آقا</label>
                                        <!--end::رادیو-->
                                        <!--begin::رادیو-->
                                        <label
                                            class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success @if($user->isMale == 0) active @endif"
                                            data-kt-button="true">
                                            <!--begin::Input-->
                                            <input class="btn-check" type="radio" @if($user->isMale == 0) checked @endif name="gender" value="0"/>
                                            <!--end::Input-->
                                            خانم</label>
                                        <!--end::رادیو-->
                                    </div>
                                    <!--end::رادیو group-->
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
                                        <span class="required">نام</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="نام کوچک (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{$user->name}}"/>
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
                                        <span class="required">نام خانوادگی</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="نام خانوادگی (اجباری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="family" value="{{$user->family}}"/>
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Tags-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>ایمیل</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="آدرس ایمیل(اختیاری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" name="email" value="{{$user->email}}"/>
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
                                        <span>تلفن</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="تلفن ثابت (اختیاری)"></i>
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="tell" value="{{$user->tell}}"/>
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
                                        <span class="required">استان</span>
                                    </label>
                                    <!--end::Tags-->
                                    <div class="w-100">
                                        <div class="form-floating border rounded">
                                            <!--begin::انتخاب2-->
                                            <select id="state" class="form-select form-select-solid lh-1 py-3" name="state_id">
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}" @if($state->id == $user->city->parent_id) selected @endif>{{$state->name}}</option>
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
                                        <span class="required">شهر</span>
                                    </label>
                                    <!--end::Tags-->
                                    <div class="w-100">
                                        <div class="form-floating border rounded">
                                            <!--begin::انتخاب2-->
                                            <select id="city" class="form-select form-select-solid lh-1 py-3" name="city_id">
                                            </select>
                                            <!--end::انتخاب2-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Separator-->
                        <div class="separator mb-6"></div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        {{--<div class="mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold mb-3">
                                <span>بروزرسانی آواتار</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   title="همه بدهکار هستیم file types: png, jpg, jpeg."></i>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Image input wrapper-->
                            <div class="mt-1">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                     style="background-image: url('{{asset('asset/back/metronic/media/svg/avatars/blank.svg')}}')">
                                    <!--begin::نمایش existing avatar-->
                                    <div class="image-input-wrapper w-100px h-100px"
                                         style="background-image: url('{{asset('asset/back/metronic/media/svg/avatars/blank.svg')}}')"></div>
                                    <!--end::نمایش existing avatar-->
                                    <!--begin::-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض آواتار">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="avatar_remove"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::-->
                                    <!--begin::انصراف-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                                                        <i class="bi bi-x fs-2"></i>
                                                                    </span>
                                    <!--end::انصراف-->
                                    <!--begin::حذف-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف آواتار">
                                                                        <i class="bi bi-x fs-2"></i>
                                                                    </span>
                                    <!--end::حذف-->
                                </div>
                                <!--end::Image input-->
                            </div>
                            <!--end::Image input wrapper-->
                        </div>--}}
                        <!--end::Input group-->
                        <!--begin::عملیات buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('user.index')}}">
                                <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>
                            </a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button id="btn_editUser" type="button" class="btn btn-primary">
                                <span class="indicator-label">ذخیره</span>
                                <span class="indicator-progress">لطفا صبر کنید...
															<span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <script> let isAdmin = 1; let getCitiesUrl = "{{route('cities')}}";let token="{{csrf_token()}}";</script>
    <script src="{{asset('asset/back/metronic/js/customize/cities.js')}}"></script>
    <script src="{{asset('asset/back/metronic/js/customize/validate/user.edit.js')}}"></script>
    <script>getCities("{{$user->city_id}}")</script>
@endsection
