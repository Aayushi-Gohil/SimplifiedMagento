<?php
// $postvars = [
//     'username' => 'admin',
//     'password' => 'admin@123'
// ];

// $curl = curl_init();

// curl_setopt($curl, CURLOPT_URL, "http://localhost/exercise/index.php/rest/V1/integration/admin/token");

// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl,CURLOPT_POSTFIELDS,$postvars);
// curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl,CURLOPT_CONNECTTIMEOUT ,3);
// curl_setopt($curl,CURLOPT_TIMEOUT, 20);

// $token = curl_exec($curl);

// curl_close($curl);

// echo($token)."<br>";

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
        // 'Authorization: bearer '.$token 
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