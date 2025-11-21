<?php

namespace App\controllers;

use App\models\OrderModel;

class OrderController
{
    public function createOrder($data){
        echo json_encode(OrderModel::createOrder($data->total, $data->origin, $data->comments, $data->client, $data->users_idusers, $data->order_details));
    }
    public function viewOrders(){
        echo json_encode(OrderModel::viewOrders());
    }
    public function viewOrder($data){
        echo json_encode(OrderModel::viewOrder($data->idorder));
    }
    public function updateStatus($data){
        echo json_encode(OrderModel::updateStatus($data->status, $data->idorder, $data->users_idusers));
    }
    public function lastOrder($data){
        echo json_encode(OrderModel::lastOrder($data->iduser));
    }
}
