<?php

namespace App\Services;

use App\Models\City;
use App\Models\Order;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\Transaction;
use App\Models\OrderStatusLog;
use App\Models\ShopOrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class OrderService {

    public function all(){
        return Order::orderBy('id' , 'desc')->paginate(20);
    }

    public function find($id){
        return Order::findOrFail($id);
    }

    public function create($data) {
        try {
            return Order::create($data);
        } catch (QueryException $queryException) {
            return $queryException->getMessage();
        }
    }

    public function updatePayment($order_id, $transaction_id) {
        try {
            $order = Order::findOrFail($order_id);
            $order->transaction_id = $transaction_id;
            $order->save();

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function updatePrice($order_id, $totalPrice) {
        try {
            $order = Order::findOrFail($order_id);
            $order->price = $totalPrice;
            $order->save();

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function changeOrderStatus($trackingCode , $status_id){
        try {
            $order = Order::whereTrackingCode($trackingCode)->first();
            $order->status_id = $status_id;
            $order->save();
            OrderStatusLog::create(['order_id' => $order->id , 'order_status_id' => $status_id , 'register_user_id' => Auth::id() ]);
            return true;
        } catch (QueryException $queryException) {
            return false;
        }

    }

    public function getFromTransaction($reference_code) {
        $transaction_id = Transaction::query()->select('id')->where('reference_code', $reference_code)->first();

        return Order::where('transaction_id', $transaction_id->id)->first();
    }

    public function getFromTrackingCode($trackingCode) {
        return Order::whereTrackingCode($trackingCode)->first();
    }

    public function getUserOrders($user_id) {
        return Order::whereUserId($user_id)->with(['sendType'])->paginate(10);
    }

    public function updateOrderProducts($trackingCode) {
        $order_id = Order::whereTrackingCode($trackingCode)->first('id')->id;
        $result = [];
        foreach ($this->getOrderProducts($order_id) as $item) {
            if ($item->count <= $item->shopProduct->count) {
                if ($item->price != $item->shopProduct->price) {
                    ShopOrderProduct::where('id', $item->id)->update(['price' => $item->shopProduct->price]);
                    $result[$item->shop_product_id] = ['message' => $item->shopProduct->product->name, 'status' => 0,
                        'old_price' => $item->price, 'new_price' => $item->shopProduct->price];
                }
            } else {
                $shopOrderProduct = ShopOrderProduct::find($item->id);
                if ($shopOrderProduct->delete()) {
                    $shopOrderProduct->update(['description' => 'حذف به دلیل عدم موجودی کالا']);
                }
                $result[$item->shop_product_id] = ['message' => $item->shopProduct->product->name, 'status' => 1];
            }
        }
        if (count($result) > 0) {
            if (! $this->updateOrderPrice($order_id)) {
                return null;
            }
        }

        return $result;
    }

    public function updateOrderPrice($order_id) {
        $total_price = 0;
        foreach ($this->getOrderProducts($order_id) as $item) {
            $total_price += $item->price * $item->count;
        }

        return $this->updatePrice($order_id, $total_price);
    }

    public function getProductPrice($shop_product_id) {
        return ShopProduct::find($shop_product_id)->first('price')->price;
    }

    public function getProductCount($shop_product_id) {
        return ShopProduct::find($shop_product_id)->first('count')->count;
    }

    public function getOrderProducts($order_id) {
        $shopOrder_ids = ShopOrder::whereOrderId($order_id)->get('id');
        return ShopOrderProduct::whereIn('shop_order_id', $shopOrder_ids)->get();
    }

    public function getOrderDetails($trackingCode) {
        $order_id = Order::whereTrackingCode($trackingCode)->get('id');
        $shopOrder_ids = ShopOrder::whereIn('order_id', $order_id)->get('id');

        return ShopOrderProduct::whereIn('shop_order_id', $shopOrder_ids)->with(['shopOrder', 'shopProduct', 'shopProduct.product'])->get();
    }

    private $state_id;
    public function getOrdersFilter($request){
        $orders = Order::query();
        if($request->status_id)
            $orders = $orders->whereStatusId($request->status_id);
        if($request->state_id){
            $this->state_id = $request->state_id;
            $orders = $orders->whereHas('city' , function ($query){
                return $query->where('parent_id' , $this->state_id);
            });
        }if($request->city_id)
            $orders = $orders->whereCityId($request->city_id);
        if($request->start_date)
            $orders = $orders->where('created_at','>=',$request->start_date.' 00:00:00');
        if($request->end_date)
            $orders = $orders->where('created_at','<=',$request->end_date.' 00:00:00');
        if($request->send_type_id)
            $orders = $orders->whereSendTypeId($request->send_type_id);

        return $orders->orderBy('id' , 'desc')->paginate(20);
    }
}
