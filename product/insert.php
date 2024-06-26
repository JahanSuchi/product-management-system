<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST['productName'];
$category = $_POST['category'];
$manufacturingDate = $_POST['manufacturingDate'];
$imageUrl = $_FILES['imageUrl']['name'];

$targetDir = "uploads/";
$targetFile = $targetDir . basename($imageUrl);
move_uploaded_file($_FILES['imageUrl']['tmp_name'], $targetFile);


$sql = "INSERT INTO product (product_name, category, manufacturing_date, image) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}


$stmt->bind_param("ssss", $productName, $category, $manufacturingDate, $targetFile);


if ($stmt->execute()) {
    echo "<script>
        alert('New product added successfully.');
        window.location.href = 'index.html';
    </script>";
} else {
    echo "Error executing the statement: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
