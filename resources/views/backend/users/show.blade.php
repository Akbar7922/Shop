@extends('layouts.backend.dashboard')
@section('content')
<div class="container">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <span class="fas fa-mobile-alt text-danger"></span>
                <h2 class="text-danger ms-3">{{ $user->mobile }}</h2>
            </div>
            <div class="card-header-pills">
                <a href="{{ route('user.edit' , $user->id) }}">
                    <button type="button" class="btn-sm btn btn-info">
                        <span class="fas fa-edit"></span>
                        <span class="text">ویرایش</span>
                    </button>
                </a>
                <button id="delete_user" type="button" class="btn-sm btn btn-danger" data-link="{{ route('user.destroy' , $user->mobile) }}">
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
                            <span>جنسیت</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $user->getGender() }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>نام</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $user->name }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>نام خانوادگی</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $user->family }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>نقش</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $user->userType->name }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>استان</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $user->city->parent->name }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>شهر</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $user->city->name }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>تلفن</span>
                        </label>
                        <span class="form-control form-control-solid">&nbsp{{ $user->tell }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>ایمیل</span>
                        </label>
                        <span class="form-control form-control-solid">&nbsp{{ $user->email }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>کد کاربری</span>
                        </label>
                        <span class="form-control form-control-solid">#{{ $user->unique_code }}</span>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>معرف</span>
                        </label>
                        <span class="form-control form-control-solid">&nbsp{{ ($user->user_unique_code) ?$user->representativeUser->getFullName():'' }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>اعتبار کیف پول</span>
                        </label>
                        <span class="form-control form-control-solid">{{ number_format($user->wallet , 0 ).' ريال' }}</span>
                    </div>
                </div>
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>تاریخ ثبت نام</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $user->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="separator mb-6"></div>
            <div class="row text-end">
                <a href="{{ route('user.index') }}">
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
    let name = "{{ $user->name }}";
    let usersLink = "{{ route('user.index') }}";

</script>
<script src="{{ asset('asset/back/metronic/js/customize/users.show.js') }}"></script>
@endsection
