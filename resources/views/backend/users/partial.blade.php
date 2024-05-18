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
                                <th class="min-w-125px">جنسیت</th>
                                <th class="min-w-125px">نام</th>
                                <th class="min-w-125px">نام خانوادگی</th>
                                <th class="min-w-125px">ش.موبایل</th>
                                <th class="min-w-125px">استان</th>
                                <th class="min-w-125px">نوع کاربری</th>
                                <th class="min-w-125px">تاریخ ایجاد</th>
                                <th class="min-w-70px">عملیات</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600 text-center">
                            @foreach($users->items() as $user)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::جنسیت=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$user->getGender()}}</span>
                                </td>
                                <!--end::جنسیت=-->
                                <!--begin::نام=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</span>
                                </td>
                                <!--end::نام=-->
                                <!--begin::نام خانوادگی=-->
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{$user->family}}</span>
                                </td>
                                <!--end::نام خانوادگی=-->
                                <!--begin::موبایل=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{$user->mobile}}</span>
                                </td>
                                <!--end::موبایل=-->
                                <!--begin::استان=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{$user->city->parent->name}}</span>
                                </td>
                                <!--end::استان=-->
                                <!--begin::نوع کاربری=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{$user->userType->name}}</span>
                                </td>
                                <!--end::نوع کاربری=-->
                                <!--begin::تاریخ ثبت نام=-->
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{$user->getCreatedAt()}}</span>
                                </td>
                                <!--end::تاریخ ثبت نام=-->
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
                                            <a href="{{route('user.show' , $user->id)}}" class="menu-link px-3">نمایش</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{route('user.edit' , $user->id)}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">ویرایش</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 delete_user" data-link="{{route('user.destroy' , $user->mobile)}}" data-name="{{$user->name}}" data-mobile="{{$user->mobile}}">
                                            <span class="menu-link px-3">حذف</span>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        {{-- <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                               data-kt-customer-table-filter="delete_row">سطح دسترسی</a>
                                        </div> --}}
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{route('user.addresses' , $user->id)}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">آدرس ها</a>
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
                    <div class="pagination">
                        {{$users->links()}}
                    </div>
