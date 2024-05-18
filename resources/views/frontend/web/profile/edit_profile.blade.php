@extends('layouts.frontend.profile_layout')
@section('style')
    <style>
        .modal-footer>* {
            min-height: 45px !important;
        }

        .dashboard-section .dashboard-table img {
            width: 65px !important;
        }

        tbody tr:hover {
            cursor: pointer;
        }
        input[type=radio][name=gender]{
            margin-right: 15px;
            margin-left: 15px;
        }
        .modal-footer{
            margin-top: 8px;
        }
    </style>
@endsection
@section('title')
    پروفایل | ویرایش اطلاعات کاربری
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('profile') }}">داشبورد</a></li>
    <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعات کاربری</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card dashboard-table mt-0">
                <div class="card-body table-responsive-sm">
                    <div class="top-sec">
                        <h3>ویرایش اطلاعات </h3>
                    </div>
                    <form id="edit_profile_form" action="{{ route('profile.updateProfile') }}"
                         method="post">
                        @csrf
                        <!--begin::Input group-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>جنسیت</span>
                                    </label>
                                    @component('components.front.gender') @endcomponent
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- split -->
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>شماره موبایل</span>
                                    </label>
                                    <div class="text-center">
                                        <h3 class="text-primary">{{ Auth::user()->mobile }}</h3>
                                        {{-- <input type="text" name="mobile" id="mobile" class="form-control rounded"> --}}
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>نام</span>
                                    </label>
                                    <div>
                                        <input type="text" class="form-control rounded" name="name" id="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- split -->
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>نام خانوادگی</span>
                                    </label>
                                    <div>
                                        <input type="text" class="form-control rounded" name="family" id="family"
                                            value="{{ Auth::user()->family }}" />
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>تلفن ثابت</span>
                                    </label>
                                    <div>
                                        <input type="text" class="form-control rounded" name="tell" id="tell"
                                        value="{{ Auth::user()->tell }}" />
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- split -->
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>آدرس ایمیل</span>
                                    </label>
                                    <div>
                                        <input type="email" name="email" id="email" class="form-control rounded"
                                        value="{{ Auth::user()->email }}"/>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>استان</span>
                                    </label>
                                    <div>
                                        <select name="state_id" id="state" data-element="modal_add"
                                            class="form-control rounded">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}" @if(Auth::user()->city->parent_id == $state->id) selected @endif>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- split -->
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="form-label mt-3">
                                        <span>شهر</span>
                                    </label>
                                    <div>
                                        <select name="city_id" id="city" class="form-control rounded">
                                        </select>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" type="button" class="btn btn-outline-danger rounded col-1">انصراف</button>
                            <button type="button" type="button" id="profile_btn_edit" class="btn btn-outline-success rounded col-2">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
@endsection
@section('scripts')
    <script>
        let token = "{{ csrf_token() }}";
        let getCitiesUrl = "{{ route('cities') }}";

        $(document).ready(function() {
            let city_id = "{{ Auth::user()->city_id }}";
            getCities(city_id);
        });
    </script>
    <script src="{{ asset('/asset/front/abzar/js/custom/profile/edit.js') }}"></script>
    <script src="{{ asset('asset/back/metronic/js/customize/cities.js') }}"></script>

@endsection
