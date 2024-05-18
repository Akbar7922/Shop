@extends('layouts.backend.dashboard')
@section('content')
<link href="{{ asset('asset/back/assets/css/persianDatepicker-default.css') }}" rel="stylesheet" />
<div class="container">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                <span class="svg-icon svg-icon-1 me-2">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M157.52 272h36.96L176 218.78 157.52 272zM352 256c-13.23 0-24 10.77-24 24s10.77 24 24 24 24-10.77 24-24-10.77-24-24-24zM464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM250.58 352h-16.94c-6.81 0-12.88-4.32-15.12-10.75L211.15 320h-70.29l-7.38 21.25A16 16 0 0 1 118.36 352h-16.94c-11.01 0-18.73-10.85-15.12-21.25L140 176.12A23.995 23.995 0 0 1 162.67 160h26.66A23.99 23.99 0 0 1 212 176.13l53.69 154.62c3.61 10.4-4.11 21.25-15.11 21.25zM424 336c0 8.84-7.16 16-16 16h-16c-4.85 0-9.04-2.27-11.98-5.68-8.62 3.66-18.09 5.68-28.02 5.68-39.7 0-72-32.3-72-72s32.3-72 72-72c8.46 0 16.46 1.73 24 4.42V176c0-8.84 7.16-16 16-16h16c8.84 0 16 7.16 16 16v160z" /></svg>
                </span>
                <!--end::Svg Icon-->
                <h2>ویرایش
                    <span class="text-bolder text-danger">{{ $event->getFullTitle() }}</span>
                </h2>
            </div>
        </div>
        <div class="card-body pt-5">
            @if($errors->any())
            <div>
                <ul class="list-group">
                    {!! implode('', $errors->all('<li class="list-group-item list-group-item-danger">:message</li>'))
                    !!}
                </ul>
            </div>
            @endif
            <form id="mainForm" class="form" method="post" action="{{route('event.update' , $event->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div id="user_create_inputs">
                    <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">عنوان</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="title" id="title" value="{{ $event->title }}" />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>نوع</span>
                            </label>
                            <select name="type" id="type" class="form-control form-control-solid" data-control="select2">
                                <option @if($event->type == 0) selected @endif value="0">رویداد</option>
                                <option @if($event->type == 1) selected @endif value="1">اخبار</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label class="fs-6 fw-bold form-label mt-3">
                                <span>تاریخ</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" name="event_date" id="event_date" value="{{ $event->getEventDate() }}"/>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">متن</span>
                                </label>
                                <textarea class="form-control form-control-solid" name="body" id="body" rows="5">{{ $event->body }}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">تصویر</span>
                                    <span class="text-danger" style="margin-right: 2rem;">پسوند تصویر شاخص رویداد / خبر (jpg , jpeg ,
                                        png) میباشد.</span>
                                </label>
                                <input type="file" name="file" class="form-control" id="pic">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="text-center">
                                <img src="{{ $event->getPicPath() }}" alt="{{ $event->title }}" srcset="" class="w-50 img img-thumbnail rounded-4">
                            </div>
                        </div>
                    </div>
                    <div class="separator mb-6"></div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('event.index')}}">
                            <button type="button" class="btn btn-light me-3">انصراف</button>
                        </a>
                        <button id="btn_add" type="button" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره</span>
                            <span class="indicator-progress">لطفا صبر کنید...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('addScript')
<script src="{{ asset('asset/back/metronic/js/customize/validate/events.create.js') }}"></script>
<script src="{{ asset('asset/back/assets/js/datepicker/persian/persianDatepicker.min.js') }}"></script>
<script>let isEdit = true; </script>
@endsection
