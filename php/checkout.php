<?php
include 'config.php';

// Assuming you have a user ID, replace 1 with the actual user ID
$userId = 1;

// Step 1: Create a new order
$createOrderQuery = "INSERT INTO orders (userid, order_total) VALUES ('$userId', '$grandTotal')";
$conn->query($createOrderQuery);
$orderId = $conn->insert_id;  // Get the auto-generated order ID

// Step 2: Update the cart items with the order ID
$updateCartQuery = "UPDATE cart SET orderid = '$orderId' WHERE ssid = '$sessionId'";
$conn->query($updateCartQuery);

// Redirect to order confirmation or any other page
header("Location: order_confirmation.php?orderid=$orderId");
exit();
?>
