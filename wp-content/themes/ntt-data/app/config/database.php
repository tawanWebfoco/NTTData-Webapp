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
}
