<?php

if (isset($_POST['insert'])) {
    require "rest/restclient.php";
    $amount = $_POST['number'];
    $currency = $_POST['val'];
    $service = new RestClient("localhost");
    $service->doRequest(RestClient::POST,"exchange_service/",array(
            'amount'=>$amount,
            'currency'=>$currency
    ));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <h1>Exchange rate</h1>
        <form method="post" action="">
            <input type="number" name="number" id="number" />
            <select name="val" id="val">
                <option value="108.55">JPY</option>
                <option value="0.77816">GBP</option>
                <option value="0.87411">EUR</option>
            </select>
            <span id="money"></span>
            <input type = "submit" name="insert" value="purchase" />
        </form>
    <button>Convert</button>

<script>
    $( document ).ready(function() {
        $("button").click(function(){
         var bla = $('#number').val();
         var sel = $( '#val' ).val();
         var sum = bla / sel;
         $('#money').text(sum + " USD");
      });
    });
</script>

</body>
</html>

