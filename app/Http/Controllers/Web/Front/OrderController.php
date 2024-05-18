<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\InstallmentService;
use App\Services\OrderService;
use App\Services\SendTypeService;
use App\Services\ShopOrderProductService;
use App\Services\ShopOrderService;
use App\Services\ShopProductService;
use App\Services\TransactionsService;
use App\Services\UserService;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{
    protected $orderService;

    protected $tid;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store($isNew, Request $request)
    {
        if ($isNew == 1) {
            //            Add Address To User Addresses
            $cityService = new CityService();
            $userAddress = [
                'title' => $request->title,
                'city_id' => $request->city_id,
                'city' => trim($cityService->getName($request->city_id)),
                'state_id' => $request->state_id,
                'state' => trim($cityService->getName($request->state_id)),
                'postalCode' => $request->postalCode,
                'address' => $request->address,
                'isSelect' => 0,
            ];
            $this->addAddress($userAddress);
            $address = $request->address . ' - ' . $request->postal_code;
            $city_id = $request->city_id;
        } elseif ($isNew == 0) {
            $user_address = json_decode(Auth::user()->addresses, true)[$request->address_list];
            $address = $user_address['address'] . ' - ' . $user_address['postalCode'];
            $city_id = $user_address['city_id'];
        } else {
            return redirect()->back();
        }

        $cartService = new CartService();
        $sendTypeService = new SendTypeService();
        $data = [
            'user_id' => Auth::id(),
            'send_price' => $sendTypeService->getBasePrice($request->send_type),
            'send_type_id' => $request->send_type,
            'pay_type_id' => $request->pay_type,
            'tracking_code' => $this->generateOrderTrackingCode(),
            'address' => $address,
            'status_id' => 1,
            'city_id' => $city_id,
            'register_user_id' => Auth::id(),
            'installments' => 0,
        ];
        if ($request->has('isInstallment')) {
            $data['price'] = $cartService->getMyShoppingCartTotal() / 2;
            $data['installments'] = 2;
        } else {
            $data['price'] = $cartService->getMyShoppingCartTotal();
        }

        $code = 0;
        if ($request->pay_type == 2) {
            if (!$this->checkWallet($data['price'] + $data['send_price'])) {
                return 'no Charge ';
            }
        }

        //        Add Order
        $order = $this->orderService->create($data);
        if ($order) {
            $code = $data['tracking_code'];
            //            Add Installments Data
            $this->createInstallment($order);
            //            Add Shop Order
            $shopOrder_resault = $this->insertShopOrder($order->id);
            if ($shopOrder_resault) {
                //                Add Shop Order Details
                $status = $this->insertShopProductOrder($shopOrder_resault);
                if ($status) {
                    $status_order = $this->payment($request->pay_type, $order);
                    //                    $cartService->deleteUserCart(Auth::id());
                    if ($status_order['status'] == 100) {
                        return $this->pay($order->price + $order->send_price, $status_order['data']->id);
                        // return $this->pay($data['price'] + $data['send_price'], $status_order['data']->id);
                    }

                    Session::put('order_status', ['status' => $status_order['status'], 'message' => 'سفارش باموفقیت ثبت شد.']);
                } else {
                    Session::put('order_status', ['status' => 401, 'message' => 'خطا در ثبت سفارش فروشگاه، لطفا با پشتیبانی تماس بگیرید.']);
                }
            } else {
                Session::put('order_status', ['status' => 402, 'message' => 'خطا در ثبت جزئیات سفارش ، لطفا با پشتیبانی تماس بگیرید. ']);
            }
        } else {
            Session::put('order_status', ['status' => 403, 'message' => 'خطا در ثبت سفارش ، مجددا تلاش کنید.']);
        }

        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();

        return view('frontend.web.order_result', compact(['code', 'order', 'categories']));
    }

    private function generateOrderTrackingCode()
    {
        return 'BKH-' . $this->date_time() . '-' . $this->randomNumber();
    }

    private function createInstallment($order)
    {
        if ($order->installments > 0) {
            $installmentService = new InstallmentService();
            for ($i = 1; $i <= $order->installments; $i++) {
                $installmentService->create([
                    'order_id' => $order->id,
                    'transaction_id' => 1,
                    'price' => CartController::calculateInstallments(CartController::getUserCartPrice()['tonnage'], $order->price),
                    'due_date' => verta()->addMonths($i)->formatJalaliDate(),
                    'status' => 0,
                    'barcode' => '-',
                    'description' => 'سفارش با اقساط ماهانه',
                    'register_user_id' => Auth::id(),
                ]);
            }
        }
    }

    public function payOrder(Request $request)
    {
        $order = $this->orderService->getFromTrackingCode($request->tracking_code);
        // if($order->shopOrder)
        $transaction = $this->insertTransaction($order, 1);
        if ($transaction) {
            return $this->pay($order->price + $order->send_price, $transaction->id);
        }
    }

    private function checkWallet($price)
    {
        if (Auth::user()->wallet >= $price) {
            return true;
        }

        return false;
    }

    private function payment($pay_type, $order)
    {
        switch ($pay_type) {
            case 1:
                //                Redirect to Payment gateway
                $transaction = $this->insertTransaction($order, 1);
                if ($transaction) {
                    return ['status' => 100, 'data' => $transaction];
                }
                return ['status' => 101];
                break;
            case 2:
                if ($this->checkWallet($order->price + $order->send_price)) {
                    if ($this->insertTransaction($order, 2)) {
                        if ($this->updateWallet($order->price + $order->send_price)) {
                            return ['status' => 200];
                        }
                    }

                    return ['status' => 201];
                }

                return ['status' => 202];
                break;
            case 3:
                return ['status' => 300];
                break;
        }
    }

    private function updateWallet($price)
    {
        $userService = new UserService();
        if ($userService->update(Auth::id(), ['wallet' => Auth::user()->wallet - $price])) {
            return true;
        }

        return false;
    }

    private function insertTransaction($order, $for_payment)
    {
        $transactionService = new TransactionsService();
        $transactionsData = [
            'order_id' => $order->id,
            'price' => $order->price + $order->send_price,
            'reference_code' => '-',
            'status_id' => 1,
            'register_user_id' => Auth::id(),
            'trackingCode' => $this->generateOrderTrackingCode(),
            'for_payments_id' => $for_payment,
            'description' => 'بابت پرداخت سفارش',
        ];
        $transaction = $transactionService->create($transactionsData);
        if ($transaction) {
            if ($this->orderService->updatePayment($order->id, $transaction->id)) {
                return $transaction;
            }
        }

        return false;
    }

    private function insertShopOrder($order_id)
    {
        $shopOrderService = new ShopOrderService();
        $cartService = new CartService();
        $status = true;
        $resault = [];
        foreach ($cartService->getShops() as $shop) {
            $shopOrderData = [
                'order_id' => $order_id,
                'shop_id' => $shop,
                'price' => $cartService->getShopPrice($shop),
                'middleMan_id' => Auth::id(),
                'status_id' => 1,
                'register_user_id' => Auth::id(),
            ];
            $res = $shopOrderService->create($shopOrderData);
            $resault[$shop] = $res->id;
            if (!$res) {
                $status = false;
            }
        }

        return $resault;
    }

    private function insertShopProductOrder($result)
    {
        $status = true;
        $shopProductService = new ShopProductService();
        $shopOrderProduct = new ShopOrderProductService();
        foreach (Auth::user()->carts as $cart) {
            $details_data = [
                'shop_order_id' => $result[$cart->shopProduct->shop_id],
                'shop_product_id' => $cart->shop_product_id,
                'discount_id' => $cart->discount_id,
                'price' => $cart->getPrice(),
                'count' => $cart->count,
                'register_user_id' => Auth::id(),
            ];

            if (!$shopOrderProduct->create($details_data))
                $status = false;

            if ($status)
                $shopProductService->decrement($cart->shop_product_id, $cart->count);
        }

        return $status;
    }

    public function pay($price, $my_transaction_id)
    {
        $this->tid = $my_transaction_id;
        $invoice = (new Invoice)->amount($price);
        // Purchase and pay the given invoice.
        // You should use return statement to redirect user to the bank page.
        return Payment::purchase($invoice, function ($driver, $transactionId) {
            // Store transactionId in database as we need it to verify payment in the future.
            // update transactions table where id is mytransaction_id
            $transactionsService = new TransactionsService();
            $transactionsService->update($this->tid, $transactionId);
        })->pay()->render();
    }

    public function callback()
    {
        $transactionService = new TransactionsService();
        try {
            if (request()->status == 'NOK') {
                if (Session::exists('from')) {
                    $statusCall = '1';
                    // $link = Session::pull('from') . 'status=1';
                    // return Redirect::to($link);
                } else {
                    $transactionService->updateStatus(
                        request()->Authority,
                        4,
                        request()->status,
                        request()->status,
                        '-'
                    );
                    Session::put('order_status', ['status' => 101, 'message' => 'خطا در پرداخت سفارش ، لطفا با پشتیبانی تماس بگیرید.']);
                }
            } else {
                if (Session::exists('from')) {
                    $statusCall = '2';
                    // $link = Session::pull('from') . 'status=2';
                    // return Redirect::to($link);
                } else {
                    $price = $transactionService->getPrice(request()->Authority)->price;
                    $receipt = Payment::amount($price)->transactionId(request()->Authority)->verify();
                    $transactionService->updateStatus(
                        request()->Authority,
                        3,
                        '-',
                        '-',
                        $receipt->getReferenceId()
                    );
                    Session::put('order_status', ['status' => 100, 'message' => 'سفارش باموفقیت ثبت شد.']);
                }
            }
        } catch (InvalidPaymentException $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/
            if (Session::exists('from')) {
                $statusCall = '3';
                // $link = Session::pull('from') . 'status=3';
                // return Redirect::to($link);
            } else {
                $transactionService->updateStatus(
                    request()->transactionId,
                    4,
                    $exception->getCode(),
                    $exception->getMessage(),
                    '-'
                );
                Session::put('order_status', ['status' => 101, 'message' => 'خطا در پرداخت سفارش ، لطفا با پشتیبانی تماس بگیرید.']);
            }
        }

        if (Session::exists('from')) {
            return view('frontend.other.callback', compact('statusCall'));
            // return Redirect::to(Session::pull('from') . 'status='.$statusCall);
        }

        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        $order = $this->orderService->getFromTransaction(request()->Authority);
        $code = $order->tracking_code;

        return view('frontend.web.order_result', compact(['code', 'order', 'categories']));
    }

    private function addAddress($data)
    {
        $userService = new UserService();
        $user = Auth::user();
        $address = json_decode($user->addresses, true);
        $address[] = $data;

        return $userService->updateAddress(Auth::id(), json_encode($address));
    }

    private function date_time()
    {
        $dateTime = str_replace(['-', ':', ' '], '', Carbon::now()->toDateTimeString());
        $date = substr($dateTime, 2, 6);
        $time = substr($dateTime, 8, 6);

        return $date . '-' . $time;
    }

    private function randomNumber()
    {
        $num1 = rand(0, 9);
        $num2 = rand(0, 9);
        $num3 = rand(0, 9);
        $num4 = rand(0, 9);

        return $num1 . $num2 . $num3 . $num4;
    }

    public function getProductsOfOrder(Request $request)
    {
        return $this->orderService->getOrderDetails($request->trackingCode);
    }
}
