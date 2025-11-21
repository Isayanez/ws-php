<?php
namespace App\models;

use App\services\GraficsService;

class GraficsModel{
    public static function bestSeller(){
        return GraficsService::bestSeller();
    }
}

?>