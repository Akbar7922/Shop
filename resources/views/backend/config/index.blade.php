@extends('layouts.backend.dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('asset/back/assets/css/custom/style.css')}}">

<div class="container">
    <!--begin::مخاطبین-->
    <div class="card card-flush h-lg-100">
        <!--begin::Card header-->
        <div class="card-header pt-7">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                <span class="svg-icon svg-icon-1 me-2">
                    <i class="fas fa-"></i>
                </span>
                <!--end::Svg Icon-->
                <h2>تنظیمات اولیه سایت</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="mainForm" class="form" method="post" action="{{route('config.store')}}" enctype="multipart/form-data">
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
                                    <span class="required">نام سامانه</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام سامانه (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input id="app_name" type="text" class="form-control form-control-solid" name="app_name" value="{{ is_null($config)?'':$config->app_name  }}" />
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
                                    <span class="required">شعار سامانه</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="شعار (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input id="slogan" type="text" class="form-control form-control-solid" name="slogan" value="{{ is_null($config)?'':$config->slogan  }}" />
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>شماره تلفن ثابت</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="تلفن ثابت (اختیاری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input id="tell" type="text" class="form-control form-control-solid" name="tell" value="{{ is_null($config)?'':$config->tell  }}" />
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">شماره تلفن همراه</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="تلفن همراه (اجباری)"></i>
                            </label>
                            <!--end::Tags-->
                            <input id="mobile" type="text" class="form-control form-control-solid" name="mobile" value="{{ is_null($config)?'':$config->mobile  }}" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <!--begin::Input group-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">آدرس ایمیل</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="آدرس ایمیل (اجباری)"></i>
                            </label>
                            <!--end::Tags-->
                            <input id="email" type="text" class="form-control form-control-solid" name="email" value="{{ is_null($config)?'':$config->email  }}" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>آدرس</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <textarea class="form-control form-control-solid" name="address" id="address" cols="30" rows="1">{{ is_null($config)?'':$config->address }}</textarea>
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
                    <div class="row">
                        <div class="col-4">
                            <!--begin::Input group-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">لوگوی کوچک</span>
                            </label>
                            <!--end::Tags-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')">
                                    <!--begin::نمایش existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')"></div>
                                    <!--end::نمایش existing avatar-->
                                    <!--begin::Tags-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض آواتار">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="small_logo" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::انصراف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::انصراف-->
                                    <!--begin::حذف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف آواتار">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::حذف-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Col-->
                        <div class="col-4">
                            <!--begin::Input group-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">لوگوی بزرگ</span>
                            </label>
                            <!--end::Tags-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')">
                                    <!--begin::نمایش existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')"></div>
                                    <!--end::نمایش existing avatar-->
                                    <!--begin::Tags-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض آواتار">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="large_logo" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::انصراف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::انصراف-->
                                    <!--begin::حذف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف آواتار">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::حذف-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <div class="col-4">
                            <!--begin::Input group-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">لودر محصولات</span>
                            </label>
                            <!--end::Tags-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')">
                                    <!--begin::نمایش existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('asset/back/metronic/media/svg/avatars/blank.svg') }}')"></div>
                                    <!--end::نمایش existing avatar-->
                                    <!--begin::Tags-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض آواتار">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="placeholder" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Tags-->
                                    <!--begin::انصراف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::انصراف-->
                                    <!--begin::حذف-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف آواتار">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::حذف-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text"> file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::عملیات buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button id="btn_submit" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
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
@section('script')
<!--  Script for ME  -->
<script src="{{asset('asset/back/metronic/js/customize/validate/config.js')}}"></script>
<script>
    main_id = 19, sub_id = 0;
</script>
@endsection
