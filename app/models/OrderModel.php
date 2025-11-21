<?php

namespace App\models;

use App\services\OrderService;
use Config\utils\CustomException as excep;

class OrderModel
{
    public static function createOrder(int $total, $origin, $comments, string $client, string $users_idusers, $order_details){
        $res = OrderService::createOrder($total, $origin, $comments, $client, $users_idusers, $order_details);
        if($res['error']) throw new excep("008");
        $msg = $res['msg'];
        return ['error'=>false, 'msg'=>['idorder'=>$msg, 'client'=>$client,'total'=>$total,'status'=>0,'comment'=>$comments]];
    }
    public static function viewOrders(){
        return OrderService::viewOrders();
    }
    public static function viewOrder($idorder){
        return OrderService::viewOrder($idorder);
    }
    public static function updateStatus($idorder, $status, $users_idusers){
        $res = OrderService::updateStatus($status, $idorder, $users_idusers);
        if($res['error']) throw new excep("009");
        return $res;
    }
    public static function lastOrder($iduser){
        return OrderService::lastOrder($iduser);
    }
}
