<?php
session_start();
include 'config.php';

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

if (!$userId) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
} else {
     $update_query = "UPDATE cart SET cid='$userId' ";

        if ($conn->query($update_query) === TRUE) {
            header("Location: cart.php");
        } else {
            echo "Error updating cid in cart: " . $conn->error;
        }
}
$cartItems = $_SESSION['cartItems'];

if (isset($_POST['checkout'])) {
    // Insert order
    $insertOrderQuery = "INSERT INTO orders (cid, status) VALUES ('$userId', 'pending')";
    
    if ($conn->query($insertOrderQuery) === TRUE) {
        $orderId = $conn->insert_id;

        // Calculate grand total
        $grandTotal = 0;
        foreach ($cartItems as $cartItem) {
            $grandTotal += $cartItem['total'];
            
            // Insert order items
            $productId = $cartItem['pid'];
            $quantity = $cartItem['quantity'];
            $price = $cartItem['price'];
            $total = $cartItem['total'];

            $insertOrderItemQuery = "INSERT INTO order_item (orderid, pid, quantity, price, total) 
                                    VALUES ('$orderId', '$productId', '$quantity', '$price', '$total')";
            $conn->query($insertOrderItemQuery);
        }

        // Insert payment
        $paymentStatus = 'pending';    // You can set the initial status as 'pending'

        $insertPaymentQuery = "INSERT INTO payment (order_id, payment_amount, payment_status) 
                              VALUES ('$orderId', '$grandTotal', '$paymentStatus')";
        if ($conn->query($insertPaymentQuery) === TRUE) {
            // Clear cart
            $clearCartQuery = "DELETE FROM cart WHERE cid = '$userId'";
            if ($conn->query($clearCartQuery) === TRUE) {
                header("Location: payment_form.php?orderid=$orderId");
                exit();
            } else {
                echo "Error clearing the cart: " . $conn->error;
            }
        } else {
            echo "Error inserting payment information: " . $conn->error;
        }
    } else {
        echo "Error inserting the order: " . $conn->error;
    }
}
?>
