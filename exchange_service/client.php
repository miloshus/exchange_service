<?php

require "rest/restclient.php";

$client = new RestClient("localhost");
echo $client->doRequest(RestClient::POST,"exchange_service/service.php",array());




