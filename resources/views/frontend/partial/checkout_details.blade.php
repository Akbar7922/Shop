<div class="checkout-details">
    <div class="order-box">
        <div class="title-box">
            <div>محصول <span>جمع</span></div>
        </div>
        <ul class="qty">
            @foreach(Auth::user()->carts as $product)
                <li>
                    {{$product->shopProduct->product->name}} × {{$product->count}}
                    <span>{{number_format($product->getPrice() * $product->count , 0)." ريال"}}</span>
                </li>
            @endforeach
        </ul>
        <ul class="sub-total" data-total-price="{{$total_cart_price}}">
            <li>
                <span class="checkout-header">مبلغ محصولات</span>
                <span class="checkout-info">
                    <span>{{number_format($total_cart_price , 0)}}</span>
                    <span> ریال</span>
                </span>
            </li>
            <li>
                <span class="checkout-header">هزینه ارسال</span>
                <span class="checkout-info">
                    <span id="shopping_cost"></span>
                    <span> ریال</span>
                </span>
            </li>
        </ul>
        <ul class="sub-total">
            <li>
                <span class="checkout-header">مجموع</span>
                <span class="checkout-info">
                    <span
                        id="total_cart_price">{{number_format($total_cart_price , 0)}}</span>
                    <span> ریال</span>
                </span>
            </li>
        </ul>
        <ul class="sub-total">
            <li>روش ارسال</li>
            <li style="text-align: center">
                @foreach($send_types as $send_type)
                    <div class="shopping-option radio_type_option"
                         data-cost="{{$send_type->base_cost}}">
                        <input type="radio" name="send_type" value="{{$send_type->id}}"
                               id="sendType{{$send_type->id}}">
                        <label
                            for="sendType{{$send_type->id}}">{{$send_type->name}}</label>
                    </div>
                @endforeach
            </li>
        </ul>
        @if(Auth::user()->groups()->where('group_id' , 1)->exists())
        <ul class="sub-total">
            <li>
                <label for="installment">
                    <input type="checkbox" name="isInstallment" id="installment"
                           value="1"
                           checked style="vertical-align: middle">
                    <span>پرداخت اقساطی</span>
                </label>
            </li>
            <li id="installmentsDiv">
                <div class="row installment_row">
                    <span class="fa fa-dot-circle-o"></span>
                    <span> قسط اول :
                            <span style="text-align: left">
                            {{number_format($installments['installment'] , 0)}} &nbsp; ریال
                        </span> &nbsp;&nbsp; - &nbsp;&nbsp;
                        تاریخ سررسید : &nbsp;&nbsp;&nbsp;
                        {{$installments['first_installment']}}
                    </span>
                </div>
                <div class="row installment_row">
                    <span class="fa fa-dot-circle-o"></span>
                    <span> قسط دوم :
                            <span style="text-align: left">
                            {{number_format($installments['installment'] , 0)}} &nbsp; ریال
                        </span> &nbsp;&nbsp; - &nbsp;&nbsp;
                        تاریخ سررسید : &nbsp;&nbsp;&nbsp;
                        {{$installments['latest_installment']}}
                    </span>
                </div>
            </li>
        </ul>
        @endif
        <ul class="sub-total">
            <li>روش پرداخت</li>
            <li style="text-align: center">
                @foreach($pay_types as $pay_type)
                    <div class="shopping-option radio_type_option">
                        <input type="radio" name="pay_type" value="{{$pay_type->id}}"
                               id="payType{{$pay_type->id}}">
                        <label for="payType{{$pay_type->id}}">
                            <img src="{{asset('/image/icons/'.$pay_type->icon)}}"
                                 alt="{{$pay_type->name}}" class="img-icon"/>
                            <span class="pay-type-title">{{$pay_type->name}}</span>
                            <span
                                class="description">{{$pay_type->description()}}</span>
                        </label>
                    </div>
                @endforeach
            </li>
        </ul>
    </div>
</div>
