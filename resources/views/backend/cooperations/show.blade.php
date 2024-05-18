@extends('layouts.backend.dashboard')
@section('content')
<div class="container">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <span class="fas fa-handshake"></span>
                <h2 class="text-danger ms-3">#{{ $cooperation->tracking_code }}</h2>
            </div>
        </div>
        <div class="card-body pt-5">
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span class="required">نام و نام خانوادگی</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $cooperation->fullName }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>شغل انتخابی</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->job->name }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>شهر محل سکونت</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->city->name }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>شماره موبایل</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $cooperation->mobile }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>کدملی</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->national_code }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>تلفن ثابت</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->tell }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>جنسیت</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $cooperation->gender() }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>وضعیت تاهل</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->maritalStatus() }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>مدرک تحصیلی</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->getDegreeOfEducation() }}</span>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                <div class="col">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <span>رشته تحصیلی</span>
                        </label>
                        <span class="form-control form-control-solid">{{ $cooperation->fieldOfStudy }}</span>
                    </div>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>دانشگاه محل تحصیل</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->university_name }}</span>
                </div>
                <div class="col">
                    <label class="fs-6 fw-bold form-label mt-3">
                        <span>تاریخ درخواست</span>
                    </label>
                    <span class="form-control form-control-solid">{{ $cooperation->created_at }}</span>
                </div>
            </div>
            <div class="row">
                <label class="fs-6 fw-bold form-label mt-3">
                    <span>آدرس محل سکونت</span>
                </label>
                <span class="form-control form-control-solid">{{ $cooperation->address }}</span>
            </div>

            <div class="separator mb-6"></div>
            <div class="row text-end">
                <a href="{{route('cooperation.index')}}">
                    <button type="button" class="btn btn-danger me-2 col-sm-3">بازگشت</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
