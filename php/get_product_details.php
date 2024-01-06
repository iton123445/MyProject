<?php 
include 'config.php';

$productId = $_GET['productId'];
$sql = "SELECT * FROM product WHERE pid = $productId";
$result = $conn->query($sql);

header('Content-Type: application/json'); // Set the content type to JSON

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array('error' => 'Product not found'));
}

$conn->close();
?>
