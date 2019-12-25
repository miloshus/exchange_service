<?php

class RestClient {

    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";
    public $host, $port, $socket;
    public function __construct($host,$port=80)
    {
          $this->host=$host;
          $this->port=$port;
    }

    public function parseResult($socket){
        $res  ="";
        while(!feof($socket)) {
            $res .= fgets($socket);
        }
        $res = explode("\r\n\r\n", $res);
        fclose($socket);
        return $res[1];
    }

     public function doRequest($method,$doc="",$params=null) {

        $socket = fsockopen($this->host,$this->port);
        if($params) {
            $params_str = "";
            foreach ($params as $k=>$v) {
                $params_str.=$k."=".$v."&";
            }
            $params_str=rtrim($params_str, "&");
            $params = $params_str;
        }
        $getparam ="";
        $postparam ="";

        if($method==RestClient::GET||$method==RestClient::DELETE) {
            $getparam = ($params)?"?$params":"";
        } else {
            $postparam = ($params)?"$params":"";
        }

        fputs($socket,"{$method} /{$doc}{$getparam} HTTP/1.1\r\n");
        fputs($socket,"Host: {$this->host}\r\n");
        if($method==RestClient::POST||$method==RestClient::PUT) {
            fputs($socket,"Content-type: application/x-www-form-urlencoded\r\n");
            fputs($socket,"Content-lenght: ".strlen($postparam)."\r\n");
        }
        fputs($socket,"Connection: close\r\n\r\n");
        if($method==RestClient::POST||$method==RestClient::PUT) {
            fputs($socket, $postparam);
        }

        $res = $this->parseResult($socket);
        return $res;

    }
}

?>


