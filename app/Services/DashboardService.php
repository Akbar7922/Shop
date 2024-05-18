<?php

namespace App\Services;

use App\Models\CooperationRequest;
use App\Models\Order;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\TicketMessage;
use App\Models\User;

class DashboardService
{
    public function getShopNumberReports($shop_id){
        return [
            'products_count' => ShopProduct::whereIn('shop_id', $shop_id)->count(),
            'orders_count' => ShopOrder::whereIn('shop_id', $shop_id)->groupBy('shop_id')->count(),
            'new_orders_count' => ShopOrder::whereIn("shop_id", $shop_id)->with(["order" => function ($query) {
                $query->where("status_id", 2);
            }])->count(),
            'active_users_count' => User::whereUserTypeId(1)->whereIsActive(1)->count(),
        ];
    }
    public function getAdminNumberReports(){
        return [
            'products_count' => ShopProduct::count(),
            'orders_count' => ShopOrder::groupBy('shop_id')->count(),
            'new_orders_count' => ShopOrder::with(["order" => function ($query) {
                $query->where("status_id", 2);
            }])->count(),
            'active_users_count' => User::whereUserTypeId(1)->where('isActive',1)->count(),
        ];
    }

    public function getNotificationReports(){
        return [
            'new_ticket_count' => TicketMessage::whereStatus(0)->count(),
            'new_orders_count' => ShopOrder::with(["order" => function ($query) {
                $query->where("status_id", 2);
            }])->count(),
            'new_cooperations_count' => CooperationRequest::whereStatus(0)->count(),
            // 'new_comments_count' => User::whereUserTypeId(1)->where('isActive',1)->count(),
        ];

    }
}
