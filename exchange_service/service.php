<?php

require "rest/restserver.php";

class MyRestService extends RestService {

    public function doGet($params){
        global $arr;
        if(isset($params['c'])){
            print_r($arr[$params['c']]);
        } else {
            print_r($arr);
        }

    }
    public function doPost($params) {
        global $arr;
        $arr[$params['c']] = $params['ct'];
        print_r($arr);
    }
}



//$rest_server = new MyRestService;
//$rest_server->handle();




