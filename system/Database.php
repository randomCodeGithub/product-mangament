<?php

class Database
{
    public static function getConnection()
    {
        //include database array with parameters
        $paramsPath = './config/dbParams.php';
        $params = include($paramsPath);

        //handling db connection
        try {
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};port={$params['port']}";
            $db = new PDO($dsn, $params['user'], $params['password']);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

    }
}
