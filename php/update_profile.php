<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    // Sanitize and validate input
    $fullName =  $_POST['fullName'];
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    // Update user details in the database
    $updateQuery = "UPDATE `customer` SET `cfullname`='$fullName', `username`='$username', `cemail`='$email' , `password` = '$password' WHERE `cid`='$userId'";
    
    if ($conn->query($updateQuery) === TRUE) {
        $_SESSION['update_message'] = 'Profile updated successfully.';
    } else {
        $_SESSION['update_message'] = 'Error updating profile: ' . $conn->error;
    }

    // Redirect back to the profile page
    header('Location: profile.php');
    exit();
} else {
    // If the request method is not POST, redirect to the profile page
    header('Location: profile.php');
    exit();
}
?>
