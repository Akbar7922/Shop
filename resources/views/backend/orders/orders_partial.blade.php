<div class="card-body">
    @if($orders->total() > 0)
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
        <thead>
            <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
                <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                    </div>
                </th>
                <th>نام و نام خانوادگی</th>
                <th>مبلغ</th>
                <th>روش ارسال</th>
                <th>روش پرداخت</th>
                <th>هزینه ارسال</th>
                <th>وضعیت</th>
                <th>تاریخ سفارش</th>
                <th>آدرس</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody class="fw-bold text-gray-600 text-center">
            @foreach($orders->items() as $item)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td>
                    <span class="text-gray-800 text-hover-primary mb-1">{{$item->user->getFullName()}}</span>
                </td>
                <td>
                    <span class="text-gray-800 text-hover-primary mb-1">{{number_format($item->price,0)}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->sendType->name}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->payType->name}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{number_format($item->send_price,0)}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->status->name}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->created_at}}</span>
                </td>
                <td>
                    <span class="text-gray-600 text-hover-primary mb-1">{{$item->address}}</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                            </svg>
                        </span>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a href="{{ route('order.show', $item->id) }}" class="menu-link px-3">نمایش</a>
                        </div>
                        {{-- <div class="menu-item px-3">
                            <a href="" class="menu-link px-3" data-kt-customer-table-filter="delete_row">ویرایش</a>
                        </div> --}}
                        {{-- <div class="menu-item px-3 delete_user" data-link="" data-name="">
                            <span class="menu-link px-3">حذف</span>
                        </div> --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$orders->links()}}
    </div>
    @else
    <div class="alert alert-danger text-center">
        رکوردی یافت نشد!
    </div>
    @endif
</div>
