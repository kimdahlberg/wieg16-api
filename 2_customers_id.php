<?php
require "db.php";

$id = $_GET ['id'];

$sql = "SELECT * FROM customers WHERE id = ".$id;
$stn = $pdo->query($sql);
$stn->execute();
$customers = $stn->fetchAll();
foreach ($customers as $key => $customer){
    $sql = "SELECT * FROM address WHERE customer_id = ".$customer['id'];
    $query = $pdo->query($sql);
    $address = $query->fetch();
    if ($address != null){
        $customers [$key]['$address'] = $address;
    }
}

header("Content-Type: application/json");
echo json_encode($customers);