                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                                <th class="min-w-125px">تصویر</th>
                                <th class="min-w-125px">نام</th>
                                <th class="min-w-125px">دسته بندی والد</th>
                                <th class="min-w-125px">رنگ</th>
                                <th class="min-w-125px">توضیحات</th>
                                <th class="min-w-70px">عملیات</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600 text-center">
                            @foreach ($categories->items() as $item)
                            <tr data-category="{{ $item }}">
                                <td>
                                    <img src="{{ asset('image/categories/' . $item->id . '.png') }}" alt="" class="img-thumbnail dashboard-img">
                                </td>
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</span>
                                </td>
                                <td>
                                    <span class="text-gray-800 text-hover-primary mb-1">{{ $item->parent_cat_id == 1 ? 'دسته اصلی' : $item->parent->name }}</span>
                                </td>
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{ $item->color == null ? 'فاقد رنگ' : $item->color }}</span>
                                </td>
                                <td>
                                    <span class="text-gray-600 text-hover-primary mb-1">{{ $item->description == null ? '-' : $item->description }}</span>
                                </td>
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
                                        <div class="menu-item px-3 edit_category" data-link="{{ route('category.update' , $item->slug) }}">
                                            <span class="menu-link px-3">ویرایش</span>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 delete_category" data-link="{{ route('category.destroy', $item->slug) }}" data-name="{{ $item->name }}">
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
                    <div class="pagination">
                        {{ $categories->links() }}
                    </div>
