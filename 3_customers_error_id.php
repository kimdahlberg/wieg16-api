<?php
require "db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM customers WHERE id = ".$id;
$statement = $pdo->query($sql);
$statement->execute();
$customer =$statement->fetch();

header("Content-Type: application/json");

if ($customer != null){
    $sql = "SELECT * FROM address WHERE customer_id = ".$customer['id'];
    $query = $pdo->query($sql);
    $address = $query->fetch();
    if ($address != null) {
        $customer['address'] = $address;
    }

    echo json_encode($customer);
}
else {
    header("HTTP/1.0 404 not found");
    echo json_encode(["message" => "Customer not found"]);
}