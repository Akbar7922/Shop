@extends('layouts.backend.dashboard')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <input id="search_input" type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="جستجو ..." />
                    </div>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('event.create') }}">
                        <button type="button" class="btn btn-primary">افزودن رویداد / خبر جدید</button>
                    </a>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>انتخاب شده
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">حذف انتخاب شده
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="table">
                    @include('backend.events.partial')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Edit Modal -->
<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="text-danger text-bold" id="title"></span>
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="fv-row text-end mb-3 pt-3">
                    تاریخ رویداد / خبر :
                    <span id="event_date"></span>
                </div>
                <div class="fv-row">
                    <span class="fs-6 fw-bold form-label mt-3 text-justify" id="body" />
                </div>
                <div class="fv-row pt-5">
                    <div class="text-center mt-3">
                        <img id="image" src="" alt="" srcset="" class="w-50 img img-thumbnail rounded-4">
                    </div>
                </div>
                </form>
                <div class="pt-8 text-end">
                    <button type="button" class="btn btn-danger col-sm-4" onclick="$('#modal_show').modal('hide');">
                        بستن
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->
@endsection
@section('script')
<script src="{{ asset('asset/back/metronic/js/customize/events.js') }}"></script>

<script>
    let token = "{{ csrf_token() }}";
    let search_url = "{{ route('event.search') }}";
    main_id = 16, sub_id = 1;

</script>
@endsection
