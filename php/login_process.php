<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM customer WHERE `username`='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);


            echo "User Input Password: $password<br>";
            echo "Hashed Password in Database: {$row['password']}<br>";

        
            if (password_verify($password, $row['password'])) {
      
                session_start();
                $_SESSION['user_id'] = $row['cid'];
                $_SESSION['username'] = $row['username'];

                header("Location: home.php");
                exit();
            } else {
                echo "<script>alert('Wrong password!'); window.location.href='login.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Account not exist!'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Query execution failed
        echo "<script>alert('Query execution failed: " . mysqli_error($conn) . "'); window.location.href='login.php';</script>";
        exit();
    }

    mysqli_free_result($result);
}

mysqli_close($conn);
?>
