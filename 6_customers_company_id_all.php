<?php
require "db.php";

$id = $_GET['company_id'];

$sql = 'SELECT * FROM customers WHERE company_id = "' . $id . '"';
$user = $pdo->query($sql);
$user->execute();
$customer = $user->fetchAll();

foreach ($customer as $key => $value) {
    $sql = "SELECT * FROM address WHERE customer_id = " . $value['id'];
    $query = $pdo->query($sql);
    $address = $query->fetch();

    if ($address != null) {
        $customer[$key]['address'] = $address;
    }
}

if (!empty($customer)) {
    header("content-type: application/json");
    echo json_encode($customer);
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(["message" => "Customer not found"]);
}


/*
$id = $_GET ['company_id'];

$sql = 'SELECT * FROM customers WHERE company_id = "' . $id . '"';
$stn = $pdo->query($sql);
$stn->execute();
$customers = $stn->fetchAll();
foreach ($customers as $key => $value){
    $sql = "SELECT * FROM address WHERE customer_id = ".$value['id'];
    $query = $pdo->query($sql);
    $address = $query->fetch();

    if ($address != null){
        $customers [$key]['$address'] = $address;
    }
}
if (!empty($customer)){
    header("Content-Type: application/json")
echo json_encode($customers);
}

header("Content-Type: application/json");
echo json_encode($customers) */