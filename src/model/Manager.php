<?php
declare(strict_types=1);

class Manager
{
    protected function connectDb()
    {
        // if (file_exists(__DIR__ . '/../.env')) {
        //     $dbUser = $_ENV['DB_NAME'];
        //     $dbPass= $_ENV['PASS'];
        // } else {
        //     $dbUser = getenv('DB_NAME');
        //     $dbPass = getenv('PASS');
        // }


        try{
            $db = new PDO("mysql:host=remotemysql.com;dbname=YlD1WTD8m9;port=3306","YlD1WTD8m9","nqgb2PnX1W");
            // $db = new PDO("mysql:host=mysql;dbname=COGIP;port=3306","root","root");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;

        } catch (Exception $e){
            die('Error :' .$e->getMessage());
        }
    }

}
