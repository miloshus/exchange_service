<?php

require "rest/restserver.php";

    class Db {
        public static $conn = null;
        public static function GetDb(){
            if(self::$conn==null){
                self::$conn = new PDO( "mysql:host=localhost;dbname=ex","root","");
            }
            return self::$conn;
        }
    }

    class ExchangeRest extends RestService {

        public function doGet($params){}
        public function doPost($params){
            $conn = Db::GetDb();
            $conn->query("insert into exchange_order values (null,'{$params['amount']}','{$params['currency']}')");

        }
        public function doPut($params){}
        public function doDelete($params){}
    }

$server = new ExchangeRest;
$server->handle();
