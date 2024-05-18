@if($favorites->total() == 0)
    <div class="alert alert-info">
        <span class="fa fa-warning"></span>
        <span class="ms-2"> لیست موردعلاقه شما خالی میباشد . </span>
    </div>
@else
<div class="table-responsive-xl">
    <table class="table cart-table wishlist-table">
        <thead>
            <tr class="table-head">
                <th scope="col">تصویر</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">فروشنده</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($favorites as $product)
                <tr>
                    <td>
                        @if (sizeof(json_decode($product->shopProduct->pictures)) > 0)
                            <img alt=""
                                src="{{ asset('image/shop_product/' . $product->shop_product_id . '/' . json_decode($product->shopProduct->pictures)[0]->picture) }}"
                                class="img-fluid">
                        @else
                            <img alt="" src="{{ asset('image/shop_product/no_picture.png') }}"
                                class="img-fluid">
                        @endif
                    </td>
                    <td onclick="window.location='{{ route('ware.show', $product->shopProduct->slug) }}';">
                        <span class="mt-0">{{ $product->shopProduct->product->name }}</span>
                    </td>
                    <td>
                        <span>{{ number_format($product->shopProduct->price, 0) . ' ريال ' }}</span>
                    </td>
                    <td>
                        <span class="theme-color fs-6">{{ $product->shopProduct->shop->name }}</span>
                    </td>
                    <td>
                        <button class="btn btn-outline-success rounded product_add_to_cart"
                            data-id="{{ $product->shop_product_id }}"
                            @if (Auth::user()->carts()->where('shop_product_id', $product->shop_product_id)->exists()) data-inCart="1" @else data-inCart="0" @endif
                            data-dash="1">
                            <i class="fa fa-cart-plus"></i>
                            <span class="spinner-border spinner-border-sm align-middle"
                                style="display: none;"></span>
                        </button>
                        <button class="btn btn-outline-danger rounded product_add_to_fav"
                            data-id="{{ $product->shop_product_id }}">
                            <i class="fa fa-heart"></i>
                            <span class="spinner-border spinner-border-sm align-middle"
                                style="display: none;"></span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination">
    {{ $favorites->links() }}
</div>
@endif
