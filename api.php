<?php
header('Content-Type: application/json');

$response = [];

if (isset($_POST['note'])) {
    $noteValue = $_POST['note'];
    
    array_push($response, $noteValue);
}

$jsonData = json_encode($response);
echo $jsonData;
?>
