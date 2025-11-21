<?php

namespace App\controllers;

use App\models\GraficsModel;

class GraficsController{
    public static function bestSeller(){
        echo json_encode(GraficsModel::bestSeller());
    }
}

?>