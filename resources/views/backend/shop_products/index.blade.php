@extends('layouts.backend.dashboard')
<style>
    .image-input {
        margin-right: 1rem;
    }

</style>
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::جستجو-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input id="search_input" type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="جستجو محصولات" />
                    </div>
                    <!--end::جستجو-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <a href="{{route('shopProduct.create')}}">
                            <button type="button" class="btn btn-primary">افزودن کالا</button>
                        </a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::گروه actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>انتخاب شده
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">حذف انتخاب شده
                        </button>
                    </div>
                    <!--end::گروه actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div id="table">
                    @include('backend.shop_products.partial')
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!-- Start Gallery Modal -->
<div class="modal fade" tabindex="-1" id="modal_gallery">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">گالری کالای
                    <span id="modal_product"></span>
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div id="modal_exists_pic">
                    <p>تصاویر قبل</p>

                </div>
                <!--begin::Form-->
                <form id="dropzoneForm" action="" enctype="multipart/form-data" method="post" style="margin-top: 1rem">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Dropzone-->
                        <div class="dropzone" id="shop_products_pictures_dropzone">
                            <!--begin::Message-->
                            <div class="dz-message needsclick">
                                <!--begin::Icon-->
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <!--end::Icon-->

                                <!--begin::Info-->
                                <div class="ms-4" style="text-align: right">
                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">تصاویر را برای آپلود میتوانید به
                                        اینجا درگ کنید.</h3>
                                    <span class="fs-7 fw-semibold text-gray-400 align-right">تا حداکثر 10 تصویر میتوانید بارگذاری کنید.</span>
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Dropzone-->
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="$('#modal_gallery').modal('hide');">تایید</button>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->
@endsection
@section('script')
<script>
    let token = "{{csrf_token()}}";
    let picUrl = "{{asset('image/shop_product/')}}";
    let search_url = "{{ route('shop.products.search') }}";
    main_id = 7 , sub_id=1;

    @if(Session::exists('status'))
    Swal.fire({
        html: `{{Session::get('status')['message']}}`
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
</script>
<script src="{{asset('asset/back/metronic/js/customize/shop.products.js')}}"></script>
@endsection
