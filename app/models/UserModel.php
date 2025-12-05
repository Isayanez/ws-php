<?php

namespace App\models;

use App\services\UserService;

class UserModel
{
    public static function getUsers()
    {
        return UserService::getUsers();
    }
    public static function getUser($id)
    {
        return UserService::getUser($id);
    }
    public static function createUser($data)
    {
        return UserService::createUser($data);
    }
    public static function updateUser($data)
    {
        return UserService::updateUser($data);
    }
    public static function deleteUser($id)
    {
        return UserService::deleteUser($id);
    }
}
