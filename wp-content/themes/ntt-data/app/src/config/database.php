<?php

class Database
{
    public static function getConnection()
    {
        $envPatch = realpath(dirname(__FILE__, 2) . '/env.ini');
        $env = parse_ini_file($envPatch);
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

        if ($conn->connect_error) {
            die('Erro: ' . $conn->connect_error);
        }
        return $conn;
    }
    public static function getResultFromQuery($sql)
    {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        return $result;
    }
    public static function executeSQL($sql) {
        $conn = self::getConnection();
        if(!mysqli_real_escape_string($conn, $sql)) {
            throw new Exception(mysqli_error($conn));
        }
        $id = $conn->insert_id;
        $conn->query($sql);
        $conn->close();
        return $id;
    }
}
