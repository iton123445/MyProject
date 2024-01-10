<?php
// Include the database connection file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $mobilenum = $_POST["mobilenum"];
    $password = $_POST["password"];

    // Secure way to prevent SQL injection
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $username = mysqli_real_escape_string($conn, $username);
    $mobilenum = mysqli_real_escape_string($conn, $mobilenum);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password for better security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform a query to insert the user data into the database
    $query = "INSERT INTO customer (cfullname, username, cnumber, password) VALUES ('$fullname', '$username', '$mobilenum', '$hashedPassword')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Retrieve the user ID after registration
        $userId = mysqli_insert_id($conn);

        session_start();
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;

        // Check for a redirect parameter
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';

        header("Location: $redirect");
        exit();
    } else {
        // Handle query execution error
        echo "<script>alert('Query execution failed: " . mysqli_error($conn) . "'); window.location.href='login.php';</script>";
        exit();
    }
}

// Close the database connection
mysqli_close($conn);
?>
