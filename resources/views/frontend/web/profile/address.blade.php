@extends('layouts.frontend.profile_layout')
@section('style')
<style>
    .modal-footer>* {
        min-height: 45px !important;
    }
    .bottom{
        justify-content: left !important;
    }
    .bottom *{
        margin-right: 5px;
        margin-left: 5px;
    }
</style>
@endsection
@section('title')
پروفایل | مدیریت آدرس ها
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('profile') }}">داشبورد</a></li>
<li class="breadcrumb-item active" aria-current="page">مدیریت آدرس ها</li>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-0">
            <div class="card-body">
                <div class="top-sec">
                    <h3>آدرس </h3>
                    <button type="button" class="btn btn-sm btn-solid" onclick="$('#modal_add').modal('show')"> ادرس جدید
                        <i class="fa fa-plus-circle" style="vertical-align: middle"></i>
                    </button>
                </div>
                <div class="address-book-section">
                    <div class="row g-4">
                        @if (Auth::user()->addresses)
                        @foreach (json_decode(Auth::user()->addresses) as $key => $address)
                        <div class="select-box active col-xl-4 col-md-6">
                            <div class="address-box">
                                <div class="top">
                                    <h6>{{ $address->title }}</h6>
                                </div>
                                <div class="middle">
                                    <div class="address">
                                        <p>{{ $address->state . '  -  ' . $address->city }}
                                        </p>
                                        <p>{{ $address->address }}</p>
                                    </div>
                                    <div class="number">
                                        <p>{{ 'کدپستی : ' . $address->postalCode }}</p>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <button class="btn btn-outline-success rounded edit_address" data-position="{{ $key }}">
                                        ویرایش
                                        <i class="fa fa-edit" style="vertical-align: middle"></i>
                                    </button>
                                    <button class="btn btn-outline-danger rounded delete_address" data-position="{{ $key }}" data-title="{{ $address->title }}">
                                        حذف
                                        <i class="fa fa-trash-o" style="vertical-align: middle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- Start Add Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ثبت آدرس جدید</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form action="{{ route('profile.addAddress') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>عنوان آدرس</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control rounded" name="title" id="title" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>استان</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="state_id" id="state" data-element="modal_add" class="form-control rounded">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>شهر</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="city_id" id="city" class="form-control rounded">
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>کدپستی</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control rounded" name="postalCode" id="postalCode" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>آدرس</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <textarea name="address" id="address" class="form-control rounded" rows="3"></textarea>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger col-sm-3 btn-rounded" onclick="$('#modal_add').modal('hide');">انصراف</button>
                    <button type="button" id="add_address_btn" class="btn btn-primary col-sm-4 btn-rounded">تایید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Add Modal -->
<!-- Start Edit Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ویرایش آدرس جدید</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form action="{{ route('profile.updateAddress') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="position">
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>عنوان آدرس</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control rounded" name="title" id="title" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>استان</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="state_id" id="state" data-element="modal_edit" class="form-control rounded state">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>شهر</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <select name="city_id" id="city" class="form-control rounded">
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>کدپستی</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <input type="text" class="form-control rounded" name="postalCode" id="postalCode" />
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Tags-->
                        <label class="form-label mt-3">
                            <span>آدرس</span>
                        </label>
                        <!--end::Tags-->
                        <!--begin::Input-->
                        <div>
                            <textarea name="address" id="address" class="form-control rounded" rows="3"></textarea>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end::Form-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger col-sm-3 btn-rounded" onclick="$('#modal_edit').modal('hide');">انصراف</button>
                    <button type="button" id="edit_address_btn" class="btn btn-primary col-sm-4 btn-rounded">تایید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->
@endsection
@section('scripts')
<script src="{{ asset('asset/back/metronic/js/customize/cities.js') }}"></script>
<script>
    let token = "{{ csrf_token() }}";
    let getCitiesUrl = "{{ route('cities') }}";
    let addresses = "{{ Auth::user()->addresses }}";
    let delete_url = "{{ route('profile.deleteAddress') }}";
</script>
<script src="{{ asset('asset/front/abzar/js/custom/profile/address.js') }}"></script>
@endsection
