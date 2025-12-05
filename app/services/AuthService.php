<?php

namespace App\services;
use Config\database\Methods as db;
use Config\Jwt\Jwt;
use Config\utils\Utils;
use Config\utils\CustomException as excep;

class AuthService
{
    public static function sign_in(string $name, string $password){
        $query = (object)[
            "query" => "SELECT * FROM users WHERE name = ? and rol NOT IN (4);",
            "params" => [$name]
        ];
        $res = db::query_one($query);
        if ($res->error) throw new excep("004");
        $msj = $res->msg;
        if(!Utils::verify($password, $msj->password)) throw new excep("005");
        return (object)["error"=>false, "msg"=>$msj];
    }
    public static function sign_up(String $name, String $password, String $id, String $phone)
    {
        //Insertar un usuario
        $query = (object)[
            "query" => "INSERT INTO `users`(`idusers`, `name`, `password`, `phone`, `rol`) VALUES (?,?,?,?,?)",
            "params" => [$id, $name, $password, $phone, "3"]
        ];
        return db::save($query);
    }
}
