<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-center text-gray-400 fw-bolder fs-7 gs-0">
        <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true"
                       data-kt-check-target="#kt_customers_table .form-check-input" value="1"/>
            </div>
        </th>
        <th class="min-w-125px">نام</th>
        <th class="min-w-125px">موبایل</th>
        <th class="min-w-125px">استان</th>
        <th class="min-w-125px">شهر</th>
        <th class="min-w-125px">وضعیت</th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600 text-center">
    @foreach($users->items() as $item)
        <tr data-mobile="{{ $item->mobile }}" data-name="{{ $item->name }}">
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="select" id="chk{{ $item->id }}"/>
                </div>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{$item->name}}</span>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{$item->mobile}}</span>
            </td>
            <td>
                <span class="text-gray-800 text-hover-primary mb-1">{{$item->city->name}}</span>
            </td>
            <td>
                <span class="text-gray-600 text-hover-primary mb-1">{{$item->city->parent->name}}</span>
            </td>
            <td>
                <span
                    class="text-gray-600 text-hover-primary mb-1"></span>
            </td>
        </tr>
    @endforeach
    </tbody>
    <!--end::Table body-->
</table>
{!! $users->render() !!}
