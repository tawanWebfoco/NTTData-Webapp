<?php

class Database
{
    public static function getConnection()
    {
        // $envPatch = realpath(dirname(__FILE__, 2) . '/env.ini');
        // $env = parse_ini_file($envPatch);
        // $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($conn->connect_error) {
            die('Erro: ' . $conn->connect_error);
        }
        $conn->set_charset("utf8");
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
        $result = '';
        if ($conn->query($sql) === TRUE) {
            $result = $conn->insert_id; 
        } else {
           throw new AppException($conn->error);
        }
        $conn->close();
        return $result;
    }
}
