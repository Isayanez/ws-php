<?php

namespace App\controllers;

use App\models\UserModel;

class UserController
{
    public function getUsers()
    {
        echo json_encode(UserModel::getUsers());
    }

    public function getUser($data)
    {
        echo json_encode(UserModel::getUser($data->id));
    }

    public function createUser($data)
    {
        echo json_encode(UserModel::createUser($data));
    }

    public function updateUser($data)
    {
        echo json_encode(UserModel::updateUser($data));
    }

    public function deleteUser($data)
    {
        echo json_encode(UserModel::deleteUser($data->id));
    }
}
