@extends('layouts.backend.dashboard')
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
                        <input id="search_input" type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="جستجو دسته بندی" />
                    </div>
                    <!--end::جستجو-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" id="add_btn" data-toggle="modal" data-target="#modal_add" onclick="$('#modal_add').modal('show');">افزودن
                        دسته بندی جدید</button>
                    <!--end::Add customer-->
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
                    @include('backend.categories.partial')
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!-- Start Add Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ثبت دسته بندی جدید</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Form-->
                <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">نام دسته بندی</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام دسته بندی (اجباری)"></i>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">دسته بندی والد</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="دسته بندی والد (اجباری)"></i>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="parent_cat_id" id="parent" class="form-control">
                                <option value="1">فاقد دسته بندی والد</option>
                                @foreach ($categories->items() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>رنگ</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control" name="color" id="color" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>توضیحات</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>تصویر دسته بندی</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="file" name="pic" id="pic" class="form-control">
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->

                <div class="modal-footer">
                    <button type="button" id="add_category_btn" class="btn btn-primary col-sm-2">تایید</button>
                    <button type="button" class="btn btn-danger col-sm-1" onclick="$('#modal_add').modal('hide');">انصراف</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->
<!-- Start Edit Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ویرایش دسته بندی جدید</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Form-->
                <form action="" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('patch')
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">نام دسته بندی</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نام دسته بندی (اجباری)"></i>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">دسته بندی والد</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="دسته بندی والد (اجباری)"></i>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="parent_cat_id" id="parent" class="form-control">
                                <option value="1">فاقد دسته بندی والد</option>
                                @foreach ($categories->items() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>رنگ</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control" name="color" id="color" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>توضیحات</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>تصویر دسته بندی</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="file" name="pic" id="pic" class="form-control">
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->

                <div class="modal-footer">
                    <button type="button" id="edit_category_btn" class="btn btn-primary col-sm-2">تایید</button>
                    <button type="button" class="btn btn-danger col-sm-1" onclick="$('#modal_edit').modal('hide');">انصراف</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/categories.js') }}"></script>

<script>
    let token = "{{ csrf_token() }}";
    let search_url = "{{ route('category.search') }}";
    main_id = 4 , sub_id=-1;

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

    $('#add_category_btn').click(function() {
        $('#modal_add form').submit();
    });

    $('#edit_category_btn').click(function() {
        $('#modal_edit form').submit();
    });

</script>
@endsection
