<?php

include 'settings.php';

$id = $_POST['data']['FIELDS']['ID'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL_IN_WH . '?id=' . $id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$data = json_decode($response, true);

// if the deal is won

$stage = $data['result']['STAGE_ID'];
if ($stage == "C58:WON") {
    $text = $data['result']['UF_CRM_1682268583584'];
    $number1 = intval($data['result']['UF_CRM_1682268611220']);
    $number2 = intval($data['result']['UF_CRM_1682268626409']);
    $sum = $number1 + $number2;
    //file_put_contents('postdata.txt', print_r(gettype($number1), true));
}

curl_close($ch);

$mysqli = require __DIR__ . "/db.php";
$sql = "INSERT INTO example (text, number1, number2, sum) VALUES ('$text', $number1, $number2, $sum)";
$mysqli->query($sql);
?>