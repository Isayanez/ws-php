<?php

    namespace Config\database;
    //Protocolo para la conexion a la bd que nos ayuda a que no nos hagan inyecciones
    use PDO;
    use \PDOException;
    class Connection
    {
        private static $host = "localhost";
        private static $db_name = "db_restaurant";
        private static $user_name = "root";
        // private static $password = "";

        public static function conection()
        {
            $password = $_ENV['DB_PASSWORD'];

            try
            {
                return new PDO('mysql:host='.self::$host.';dbname='.self::$db_name, self::$user_name, $password);
            }
            catch(PDOException $e)
            {
                return null;
            }
        }
    }
?>