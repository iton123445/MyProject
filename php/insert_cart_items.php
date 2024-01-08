<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $conn->real_escape_string($_POST['pid']);
    $productName = $conn->real_escape_string($_POST['pname']);
    $productPrice = $conn->real_escape_string($_POST['pprice']);
    $quantity = 1; // You can set a default quantity or let the user choose it

    // Perform your database insertion logic here
    $insert_query = "INSERT INTO cart (pid, price, quantity) 
                     VALUES ('$productId', '$productPrice', '$quantity')";

    if ($conn->query($insert_query) === TRUE) {
        header("Location: home.php");
    } else {
        echo "Error adding item to cart: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
