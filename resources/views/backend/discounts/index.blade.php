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
                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="جستجو " />
                    </div>
                    <!--end::جستجو-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Add customer-->
                        <a href="{{route('discount.create')}}">
                            <button type="button" class="btn btn-primary">افزودن تخفیف</button>
                        </a>
                        <!--end::Add customer-->
                    </div>
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
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th>نوع تخفیف</th>
                            <th>موجودیت</th>
                            <th>نوع مخاطب</th>
                            <th>مخاطب</th>
                            <th>میزان تخفیف</th>
                            <th>کد تخفیف</th>
                            <th>شروع تخفیف</th>
                            <th>پایان تخفیف</th>
                            <th>عملیات</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600 text-center">
                        @foreach($discounts->items() as $discount)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$discount->getType()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$discount->getEntity()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-800 text-hover-primary mb-1">{{$discount->getForType()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$discount->getFor()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$discount->getDiscount()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$discount->discount_code}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$discount->getStartDate()}}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 text-hover-primary mb-1">{{$discount->getEndDate()}}</span>
                            </td>
                            <!--begin::عملیات=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('discount.show' , $discount->id)}}" class="menu-link px-3">نمایش</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('discount.edit' , $discount->id)}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">ویرایش</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 delete_user" data-link="{{route('discount.destroy' , $discount->id)}}" data-name="{{$discount->discount_code}}">
                                        <span class="menu-link px-3">حذف</span>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::عملیات=-->
                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                <div>
                    {{$discounts->links()}}
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
<script>
    let token = "{{csrf_token()}}";
    main_id = 9 , sub_id=1;

    @if(Session::exists('status'))
    Swal.fire({
        html: `{{Session::get('status')['message']}}`
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

    $('.delete_user').click(function() {
        let name = $(this).attr('data-name');
        Swal.fire({
            html: `آیا از حذف تخفیف <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله ، حذف شود"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                deleteUser($(this));
            }
        });
    });

    function deleteUser(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                '_method': 'DELETE'
            }
            , success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    element.closest('tr').remove();
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    })
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function() {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.'
                    , icon: 'error'
                    , confirmButtonText: "باشه"
                })
            }
        });
    }

</script>
@endsection
