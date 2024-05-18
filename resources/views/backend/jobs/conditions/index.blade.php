@extends('layouts.backend.dashboard')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-body pt-0">
                <div class="mb-5 mt-8">
                    <h3>
                        <span class="fas fa-plus-circle align-middle me-2"></span>
                        افزون شرایط جدید</h3>
                </div>
                <div>
                    @csrf
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">متن شرط</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="متن شرط (اجباری)"></i>
                            </label>
                            <input type="text" class="form-control" name="text" id="text" />
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span class="required">نوع شرط</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="نوع شرط (اجباری)"></i>
                            </label>
                            <select name="type" id="type" class="form-control" data-control="select2">
                                <option value="0">شرایط حقوقی و ساعت کاری</option>
                                <option value="1">شرایط استخدامی</option>
                                <option value="2">مدارک موردنیاز</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="separator mb-6"></div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('job.index') }}" class="me-5">
                            <button type="button" class="btn btn-danger ps-10 pe-10">انصراف</button>
                        </a>
                        <button type="button" id="btn_add_item" class="btn btn-primary ps-20 pe-20" data-link="{{ route('condition.store' , request('job_id')) }}">
                            <span class="indicator-label">ذخیره</span>
                            <span class="indicator-progress">لطفا صبر کنید...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="table">
                    @include('backend.jobs.conditions.partial')
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/conditions.js') }}"></script>
<script>
    let token = "{{ csrf_token() }}";
    let url = "{{ request()->url() }}";

</script>
@endsection
