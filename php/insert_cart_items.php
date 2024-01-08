<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $conn->real_escape_string($_POST['pid']);
    $quantity = 1; // You can set a default quantity or let the user choose it

    // Check if the product is already in the cart
    $check_query = "SELECT cartid, quantity, price FROM cart WHERE pid='$productId'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Product is already in the cart, update the quantity and total
        $row = $check_result->fetch_assoc();
        $newQuantity = $row['quantity'] + $quantity;
        $newTotal = $newQuantity * $row['price'];

        $update_query = "UPDATE cart SET quantity='$newQuantity', total='$newTotal' WHERE cartid='{$row['cartid']}'";

        if ($conn->query($update_query) === TRUE) {
            header("Location: home.php");
        } else {
            echo "Error updating quantity and total in cart: " . $conn->error;
        }
    } else {
        // Product is not in the cart, add a new entry
        $productName = $conn->real_escape_string($_POST['pname']);
        $productPrice = $conn->real_escape_string($_POST['pprice']);
        $total = $quantity * $productPrice;

        $insert_query = "INSERT INTO cart (pid, price, quantity, total,method) 
                         VALUES ('$productId', '$productPrice', '$quantity', '$total','cart')";

        if ($conn->query($insert_query) === TRUE) {
            header("Location: home.php");
        } else {
            echo "Error adding item to cart: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
