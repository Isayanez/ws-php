<?php

namespace App\services;

use Config\database\Methods as db;
use Config\utils\Utils;
use Config\utils\CustomException as excep;

class UserService
{
    // Obtener todos los usuarios
    public static function getUsers()
    {
        $query = (object)[
            "query" => "SELECT idusers, name, phone, rol FROM users ORDER BY rol ASC",
            "params" => []
        ];
        return db::query($query);
    }

    // Obtener un solo usuario por ID
    public static function getUser($id)
    {
        $query = (object)[
            "query" => "SELECT idusers, name, phone, rol FROM users WHERE idusers = ?",
            "params" => [$id]
        ];
        return db::query_one($query);
    }

    // Crear usuario
    public static function createUser($data)
    {
        // Regla de negocio: Admin no crea clientes (Rol 3)
        if ($data->rol == 3) throw new excep("008"); // Usamos un código de error genérico

        $id = Utils::uuid();
        $password = Utils::hash($data->password);

        $query = (object)[
            "query" => "INSERT INTO users (idusers, name, password, phone, rol) VALUES (?, ?, ?, ?, ?)",
            "params" => [$id, $data->name, $password, $data->phone, $data->rol]
        ];
        return db::save($query);
    }

    // Actualizar usuario
    public static function updateUser($data)
    {
        // Si viene contraseña, la actualizamos, si no, mantenemos la vieja
        if (isset($data->password) && !empty($data->password)) {
            $password = Utils::hash($data->password);
            $query = (object)[
                "query" => "UPDATE users SET name=?, phone=?, rol=?, password=? WHERE idusers=?",
                "params" => [$data->name, $data->phone, $data->rol, $password, $data->idusers]
            ];
        } else {
            $query = (object)[
                "query" => "UPDATE users SET name=?, phone=?, rol=? WHERE idusers=?",
                "params" => [$data->name, $data->phone, $data->rol, $data->idusers]
            ];
        }
        return db::save($query);
    }

    // Eliminar usuario
    public static function deleteUser($id)
    {
        $query = (object)[
            "query" => "DELETE FROM users WHERE idusers = ?",
            "params" => [$id]
        ];
        return db::save($query);
    }
}
?>