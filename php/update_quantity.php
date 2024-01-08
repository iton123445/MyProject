<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update_quantity'])) {
        // Handle the update action
        $productId = $conn->real_escape_string($_POST['update_quantity']);
        
        // Fetch the price from the array based on the product ID
        $priceArray = $_POST['price'];
        $price = $conn->real_escape_string($priceArray[$productId]);

        $newQuantity = $conn->real_escape_string($_POST['quantity'][$productId]);
        $Sub_total = $newQuantity * $price;

        // Update the quantity in the database
        $updateQuery = "UPDATE cart SET quantity = '$newQuantity', total = '$Sub_total' WHERE pid = '$productId'";
        
        if ($conn->query($updateQuery) === TRUE) {
            echo '<script>showUpdateMessage("Quantity updated successfully!");</script>';
        } else {
            // Handle error as needed
            echo '<script>showUpdateMessage("Error updating quantity: ' . $conn->error . '");</script>';
        }
    } elseif (isset($_POST['remove_from_cart'])) {
        // Handle the remove action
        $productId = $conn->real_escape_string($_POST['remove_from_cart']);

        // Remove the item from the cart in the database
        $removeQuery = "DELETE FROM cart WHERE pid = '$productId'";
        
        if ($conn->query($removeQuery) === TRUE) {
            echo '<script>showUpdateMessage("Item removed successfully!");</script>';
        } else {
            // Handle error as needed
            echo '<script>showUpdateMessage("Error removing item from the cart: ' . $conn->error . '");</script>';
        }
    }

    // Redirect back to the cart page after the JavaScript executes
    echo '<script>window.location.href = "cart.php";</script>';
}

// Close the database connection
$conn->close();
?>
