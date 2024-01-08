<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_quantity'])) {
    $productId = $conn->real_escape_string($_POST['update_quantity']);
    $newQuantity = $conn->real_escape_string($_POST['quantity'][$productId]);

    // Update the quantity in the database
    $updateQuery = "UPDATE cart SET quantity = '$newQuantity' WHERE pid = '$productId'";
    
    if ($conn->query($updateQuery) === TRUE) {
        // Redirect back to the cart page or handle success as needed
        header("Location: cart.php");
    } else {
        // Handle error as needed
        echo 'Error updating quantity: ' . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
