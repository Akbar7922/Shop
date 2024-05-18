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
                    <i class="fas fa-user-plus"></i>
                </span>
                <!--end::Svg Icon-->
                <h2>افزودن محصول جدید</h2>
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
            <form id="addProductForm" class="form" method="post" action="{{route('product.store')}}">
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
                                    <span class="required">نام</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام محصول (اجباری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="name" value="" />
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
                                    <span>نام لاتین</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام لاتین محصول (اختیاری)"></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="en_name" value="" />
                                <!--end::Input-->
                                {{-- <div class="fv-plugins-message-container invalid-feedback"></div>--}}
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
                            <!--begin::Tags-->
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">دسته بندی</span>
                            </label>
                            <!--end::Tags-->
                            <div class="w-100">
                                <div class="form-floating border rounded">
                                    <!--begin::انتخاب2-->
                                    <select id="category" name="category_id" class="form-select form-select-solid lh-1 py-3" name="state_id" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب دسته بندی">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::انتخاب2-->
                                </div>
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
                                    <span>توضیحات</span>
                                </label>
                                <!--end::Tags-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::انتخاب2-->
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                        <!--end::انتخاب2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="mb-7">
                                <!--begin::Tags-->
                                <label class="fs-6 fw-bold mb-3">
                                    <span>بروزرسانی تصویر محصول</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=" file types: png, jpg, jpeg."></i>
                                </label>
                                <!--end::Tags-->
                                <!--begin::Image input wrapper-->
                                <div class="mt-1">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('asset/back/metronic/media/svg/avatars/blank.svg')}}')">
                                        <!--begin::نمایش existing avatar-->
                                        <div class="image-input-wrapper w-100px h-100px" style="background-image: url('{{asset('asset/back/metronic/media/svg/avatars/blank.svg')}}')"></div>
                                        <!--end::نمایش existing avatar-->
                                        <!--begin::-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعویض تصویر">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::-->
                                        <!--begin::انصراف-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="انصراف avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::انصراف-->
                                        <!--begin::حذف-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف تصویر">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::حذف-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Image input wrapper-->
                            </div>
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
                        <a href="{{route('product.index')}}">
                            <button type="button" data-kt-contacts-type="cancel" class="btn btn-light me-3">انصراف</button>
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button id="btn_addProduct" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
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
<script src="{{asset('asset/back/metronic/js/customize/validate/product.create.js')}}"></script>
<script>
    main_id = 5, sub_id = 0;

</script>
@endsection
