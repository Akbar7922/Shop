@if($orders->total() == 0)
    <div class="alert alert-info">
        <span class="fa fa-warning"></span>
        <span class="ms-2"> تاکنونی سفارشی برای شما ثبت نشده است . </span>
    </div>
@else
<div class="table-responsive-xl">
    <table class="table cart-table order-table">
        <thead>
            <tr class="table-head">
                <th scope="col">کد پیگیری</th>
                <th scope="col">قیمت</th>
                <th scope="col">هزینه ارسال</th>
                <th scope="col">روش پرداخت</th>
                <th scope="col">وضعیت</th>
                <th scope="col">جزئیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders->items() as $key => $order)
            <tr data-trackingCode="{{ $order->tracking_code }}" data-position="{{ $key }}" >
                <td>
                    <span class="mt-0">{{ $order->tracking_code }}</span>
                </td>
                <td>
                    <span class="fs-6">{{ number_format($order->price, 0) . ' ريال' }}</span>
                </td>
                <td>
                    <span class="fs-6">{{ number_format($order->send_price, 0) . ' ريال' }}</span>
                </td>
                <td>
                    <span class="theme-color fs-6">{{ $order->payType->name }}</span>
                </td>
                <td>
                    <span class="badge rounded-pill bg-success custom-badge">{{ $order->status->name }}</span>
                </td>
                <td>
                    <a href="{{ route('profile.order.details' , ['trackingCode' => $order->tracking_code]) }}" target="_blank">
                        <button class="btn btn-outline-primary rounded" style="font-size: 0.8rem;">
                            <i class="fa fa-eye" style="vertical-align: middle;margin-left: 8px;"></i>
                            مشاهده جزئیات
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pagination">
    {{ $orders->links() }}
</div>
@endif
