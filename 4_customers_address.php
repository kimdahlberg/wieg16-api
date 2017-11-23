<?php
require "db.php";

$id = $_GET['customer_id'];

$sql = "SELECT street, postcode, city FROM address WHERE customer_id = ".$id;
$statement = $pdo->query($sql);
$statement->execute();
$customer =$statement->fetch();

header("Content-Type: application/json");

if ($customer != null){
    echo json_encode($customer);
}
else {
    header("HTTP/1.0 404 not found");
    echo json_encode(["message" => "Address not found"]);
}