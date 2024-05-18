@extends('layouts.backend.dashboard')
@section('content')
<link href="{{ asset('asset/back/assets/css/persianDatepicker-default.css') }}" rel="stylesheet" />

<style>
    .filter_button {
        text-align: left;
        margin-top: 1rem;
    }

    .spinner {
        display: none;
    }

</style>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <input type="hidden" name="input_start_date">
        <input type="hidden" name="input_end_date">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="row container" id="filter_div" style="margin-top: 1.5rem;">
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_0">
                            <span>نوع</span>
                        </label>
                        <div class="form-floating border rounded" id="typeDiv">
                            <select id="type" name="isGroup" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب نوع">
                                @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_1">
                            <span>استان</span>
                        </label>
                        <div class="form-floating border rounded" id="stateDiv">
                            <select id="state" name="state" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب استان">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_2">
                            <span>شهر</span>
                        </label>
                        <div class="form-floating border rounded" id="cityDiv">
                            <select id="city" name="city" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب شهر">
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_3">
                            <span>از تاریخ :</span>
                        </label>
                        <div id="startDateDiv">
                            <span class="form-control form-control-solid" id="start_date">&nbsp;</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_4">
                            <span>تا تاریخ : </span>
                        </label>
                        <div id="endDateDiv">
                            <span class="form-control form-control-solid" id="end_date">&nbsp;</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fs-6 fw-bold form-label mt-3">
                            <input type="checkbox" name="filter" id="filter_5">
                            <span>روش ارسال</span>
                        </label>
                        <div class="form-floating border rounded" id="sendTypeDiv">
                            <select id="send_type" name="send_type" class="form-select lh-1 py-3" data-control="select2" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="انتخاب روش ارسال">
                                @foreach($sendTypes as $sendType)
                                <option value="{{ $sendType->id }}">{{ $sendType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="filter_button">
                        <button type="button" id="submit_filter" class="btn btn-info col-md-2">
                            <i class="fas fa-filter"></i>
                            <div style="display: inline-block">
                                <span class="text">اعمال فیلتر</span>
                                <span class="spinner spinner-border spinner-border-sm align-middle ms-2"></span>
                            </div>
                        </button>
                    </div>
                </div>

            </div>
            <div id="table">
                @include('backend.orders.orders_partial')
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/orders.js') }}"></script>
<script src="{{ asset('asset/back/assets/js/datepicker/persian/persianDatepicker.min.js') }}"></script>
<script src="{{ asset('asset/back/metronic/js/customize/cities.js') }}"></script>
<script src="{{ asset('asset/back/metronic/js/customize/toast.custom.js') }}"></script>

<script>
    let getCitiesUrl = "{{route('cities')}}";
    var filterUrl = "{{ route('orders.filter') }}";
    let token = "{{csrf_token()}}";
    main_id = 8, sub_id = -1;
</script>

@endsection
