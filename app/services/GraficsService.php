<?php

namespace App\services;

use Config\database\Methods as db;
use Config\utils\Utils;

class GraficsService{
    public static function bestSeller(){
        $query = (object)[
            "query" =>"SELECT SUM(total) FROM `order` WHERE status=3",
            "params" =>[]
        ];
        return db::query($query);
    }
}

?>