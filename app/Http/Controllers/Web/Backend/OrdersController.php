<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Services\CityService;
use App\Services\SendTypeService;

class OrdersController extends Controller
{

    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityService = new CityService();
        $sendTypeService = new SendTypeService();
        $orders = $this->orderService->all();
        $states = $cityService->getStates();
        $statuses = OrderStatus::all();
        $sendTypes = $sendTypeService->getAll();
        return view('backend.orders.index', compact(['orders', 'states', 'statuses', 'sendTypes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->find($id);
        return view('backend.orders.details', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeOrderStatus($trackingCode)
    {
        $order = $this->orderService->getFromTrackingCode($trackingCode);
        switch ($order->status_id) {
            case 2:
                $status_id = 3;
                break;
            case 3:
                if ($order->send_type_id == 3)
                    $status_id = 7;
                else
                    $status_id = 4;
                break;
            case 4:
                $status_id = 5;
                break;
            default:
                $status_id = 0;
                break;
        }
        if ($status_id > 0)
            if ($this->orderService->changeOrderStatus($trackingCode, $status_id))
                return response()->json(['status' => 200, 'message' => 'وضعیت سفارش باموفقیت تغییر کرد.']);
            else
                return response()->json(['status' => 201, 'message' => 'خطا در تغییر وضعیت سفارش ، مجددا تلاش کنید']);
        return response()->json(['status' => 202, 'message' => 'شما مجاز به تغییر سفارش نیستید']);
    }

    public function ordersFilter(Request $request)
    {
        if ($request->status_id)
            return 'ok';
        $orders = $this->orderService->getOrdersFilter($request);
        return view('backend.orders.orders_partial', compact(['orders']));
    }
}
