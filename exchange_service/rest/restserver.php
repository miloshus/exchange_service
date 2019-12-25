<?php

class RestService {
    const GET = 1;
    const POST = 2;
    const PUT = 3;
    const DELETE = 4;

     public function checkMethod()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        switch ($method) {
            case "get":
                return RestService::GET;
                break;
            case "post":
                return RestService::POST;
                break;
            case "put":
                return RestService::PUT;
                break;
            case "delete":
                return RestService::DELETE;
                break;
        }
    }

     public function handle() {
            $method = $this->checkMethod();
            switch($method) {
                case RestService::GET;
                $this->doGet($_GET);
                break;
                case RestService::POST;
                $this->doPost($_POST);
                break;
                case RestService::PUT;
                $this->doPut();
                break;
                case RestService::DELETE;
                $this->doDelete();
                break;
            }
    }

        public function doGet($params){}
        public function doPost($params){}
        public function doPut($params){}
        public function doDelete($params){}
}

?>




