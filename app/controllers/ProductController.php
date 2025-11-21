<?php

namespace App\controllers;

use App\models\AuthModel;

class ProductController {

    public function createProduct($data){
        echo json_encode($data);
    }

}

?>