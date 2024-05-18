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

                        <!--end::جستجو-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Add customer-->
                            <span onclick="getCities(0)" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
                                <button type="button" class="btn btn-primary">افزودن آدرس</button>
                            </span>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
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
                            <th class="min-w-125px">عنوان</th>
                            <th class="min-w-125px">استان</th>
                            <th class="min-w-125px">شهر</th>
                            <th class="min-w-125px">کدپستی</th>
                            <th class="min-w-125px">آدرس</th>
                            <th class="min-w-125px">پیشفرض</th>
                            <th class="min-w-70px">عملیات</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600 text-center">
                        @foreach(json_decode($user->addresses) as $key => $address)
                            <tr id="{{$key}}" data-address="{{json_encode($address)}}">

                                <!--begin::عنوان=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$address->title}}</span>
                                </td>
                                <!--end::عنوان=-->
                                <!--begin::استان=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$address->state}}</span>
                                </td>
                                <!--end::استان=-->
                                <!--begin::شهر=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$address->city}}</span>
                                </td>
                                <!--end::شهر=-->
                                <!--begin::کدپستی=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{$address->postalCode}}</span>
                                </td>
                                <!--end::کدپستی=-->
                                <!--begin::آدرس=-->
                                <td>
                                    <span
                                        class="text-gray-600 text-hover-primary mb-1">{{$address->address}}</span>
                                </td>
                                <!--end::آدرس=-->
                                <!--begin::پیشفرض=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">
                                        {{--<i class="fas "></i>
                                        @if($address->isSelected == 1)  @endif--}}
                                    </span>
                                </td>
                                <!--end::پیشفرض=-->
                                <!--begin::عملیات=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <span data-position="{{$key}}"
                                                  class="menu-link px-3 address_edit">ویرایش</span>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <span class="menu-link px-3 delete_address"
                                                  data-link="{{route('user.address.delete' , $user->id)}}"
                                                  data-title="{{$address->title}}" data-position="{{$key}}">حذف</span>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                               data-kt-customer-table-filter="delete_row">پیشفرض</a>
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
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - آدرس - Add-->
            <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form" action="{{route('user.address.add' , $user->id)}}"
                              id="modal_add_address_form"
                              method="post">
                            @csrf
                            <input type="hidden" name="position">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">
                                    <span id="modal_title">افزودن آدرس</span>
                                </h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_add_customer_close"
                                     class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                      height="2" rx="1"
                                                                      transform="rotate(-45 6 17.3137)"
                                                                      fill="currentColor"/>
																<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                      transform="rotate(45 7.41422 6)"
                                                                      fill="currentColor"/>
															</svg>
														</span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                     data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                     data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                     data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">عنوان آدرس</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <input type="text" id="title" class="form-control form-control-solid"
                                                   placeholder=""
                                                   name="title" value=""/>
                                            <span class="error_input" id="title_error"></span>
                                            <!--end::Input-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">کدپستی</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                   name="postalCode" id="postalCode" value=""/>
                                            <span class="error_input" id="postal_code_error"></span>

                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Tags-->
                                            <label class="required fs-6 fw-bold mb-2">استان</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <select name="state_id" id="state"
                                                    class="form-select form-select-solid fw-bolder">
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="state">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Tags-->
                                            <label class="required fs-6 fw-bold mb-2">شهر</label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <select name="city_id" id="city"
                                                    class="form-select form-select-solid fw-bolder">
                                            </select>
                                            <span class="error_input" id="city_error"></span>
                                            <input type="hidden" name="city">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->

                                    </div>

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-15">
                                        <!--begin::Tags-->
                                        <label class="fs-6 fw-bold mb-2">آدرس</label>
                                        <!--end::Tags-->
                                        <!--begin::Input-->
                                        <textarea type="text" id="address" class="form-control form-control-solid"
                                                  placeholder=""
                                                  name="address" rows="8"></textarea>
                                        <span class="error_input" id="address_error"></span>

                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">لغو
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" id="modal_address_add" class="btn btn-primary">
                                    <span class="indicator-label">ثبت</span>
                                    <span class="indicator-progress">لطفا صبر کنید...
														<span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - آدرس - Add-->
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@section('script')
    <script>
        let token = "{{ csrf_token() }}";
        let getCitiesUrl = "{{route('cities')}}";
        let editUrl = "{{route('user.address.update', $user->id)}}";
        @if(Session::exists('status'))
            Swal.fire({
                html: `{{Session::get('status')['message']}}`,
                icon: @if(Session::pull('status')['status'] == 200) "success" @else "error" @endif,
                buttonsStyling: false,
                showCancelButton: true,
                showConfirmButton:false,
                cancelButtonText: "باشه",
                customClass: {
                    cancelButton: "btn btn-primary",
                }
            });
        @endif
    </script>
    <script src="{{asset('asset/back/metronic/js/customize/address.js')}}"></script>
@endsection
