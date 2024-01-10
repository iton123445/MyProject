<?php
session_start();
include 'config.php';

if (isset($_POST['cancelOrder'])) {
    $orderId = $_POST['orderId'];

    // Update the order status to 'cancelled'
    $updateStatusQuery = "UPDATE orders SET status = 'cancelled' WHERE orderid = '$orderId'";
    $conn->query($updateStatusQuery);

    // Redirect back to the page displaying pending orders
    header("Location: order.php");
    exit();
}
?>
