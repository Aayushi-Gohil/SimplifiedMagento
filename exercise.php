<?php
$data_array = [
    'qty' => 50,
    'is_in_stock' => 1
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/exercise/rest/default/V1/products/Subscription/stockItems/1");
curl_setopt(
    $ch, 
    CURLOPT_HTTPHEADER, 
    array(
        'Content-Type: application/json', 
        'Authorization: bearer qzz3p2gfywxxep3z2y6oycfgy52elg6s'
    )
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array("stockItem"=>$data_array)));
$output = curl_exec($ch);
curl_close($ch);
echo($output);
echo "<br>The quantity and stock status is updated.";
