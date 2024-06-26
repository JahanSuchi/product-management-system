<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, product_name AS name, category, manufacturing_date AS manufacturingDate, image AS imageUrl FROM product";
$result = $conn->query($sql);


$products = array();


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}


$conn->close();


header('Content-Type: application/json');


echo json_encode($products);
?>