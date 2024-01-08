<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cartId = $conn->real_escape_string($_POST['cartid']);

    // Perform your database deletion logic here
    $delete_query = "DELETE FROM cart WHERE cartid = '$cartId'";

    if ($conn->query($delete_query) === TRUE) {
        // Redirect back to the page where the user came from (e.g., home.php)
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting item from cart: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
