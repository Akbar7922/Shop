@extends('layouts.backend.dashboard')
@section('content')
<div class="container">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <span class="fas fa-tag text-danger"></span>
                <h2 class="text-danger ms-3">#{{ $discount->discount_code }}</h2>
            </div>
            <div class="card-header-pills">
                <a href="{{ route('discount.edit' , $discount->id) }}">
                    <button type="button" class="btn-sm btn btn-info">
                        <span class="fas fa-edit"></span>
                        <span class="text">ویرایش</span>
                    </button>
                </a>
                <button id="delete_btn" type="button" class="btn-sm btn btn-danger" data-link="{{ route('discount.destroy' , $discount->id) }}">
                    <span class="fas fa-trash"></span>
                    <span class="text">حذف</span>
                </button>
            </div>
        </div>
        <div class="card-body pt-5">
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>ماهیت تخفیف</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $discount->getType() }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>مخاطبین تخفیف</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $discount->getEntity() }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>میزان تخفیف</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $discount->getDiscount() }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>کد تخفیف</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $discount->discount_code }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>زمان شروع</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $discount->getStartDate() }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>زمان پایان</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $discount->getEndDate() }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>تاریخ ایجاد تخفیف</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $discount->created_at }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>کاربر ایجاد کننده</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $discount->userRegister->getFullName() }}</span>
                    </div>
                </div>
            </div>
            <div class="separator mb-6"></div>
            <div class="row text-end">
                <a href="{{ route('discount.index') }}">
                    <button type="button" class="btn btn-danger me-2">بازگشت</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    let token = "{{ csrf_token() }}";
    let code = "{{ $discount->discount_code }}";
    let indexLink = "{{ route('discount.index') }}";

</script>
<script src="{{ asset('asset/back/metronic/js/customize/discount.show.js') }}"></script>
@endsection
