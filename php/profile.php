<?php
session_start();
include 'config.php';
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$customerQuery = "SELECT * FROM `customer` WHERE cid = '$userId'";
$customerResult = $conn->query($customerQuery);

if ($customerResult->num_rows > 0) {
    $customerData = $customerResult->fetch_assoc();
    $fullName = $customerData['cfullname'];
    $username = $customerData['username'];
    $email = $customerData['cemail'];
    $password = $customerData['password'];
} else {
    // Handle the case where user details are not found
    $fullName = 'N/A';
    $username = 'N/A';
    $email = 'N/A';
    $password = 'N/A';
}

$cartCount = getCartItemCount($userId, $conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.profile-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #fff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-image: linear-gradient(
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0)
  ),
  linear-gradient(101deg, #7676f2, #00d4ff);
}

button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}
ul {
list-style-type: none;
left: 0;
margin: 0;
padding: 0;
overflow: hidden;
/* background-color: #333; */
background-image: linear-gradient(
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0)
  ),
  linear-gradient(101deg, #7676f2, #00d4ff);
  position: fixed;
top: 0;
width: 100%;
z-index: 1;
}

li {
float: left;
}

li a {
display: block;
color: white;
text-align: center;
padding: 24px 30px;
text-decoration: none;
}

li a:hover {
background-color: #6285f4;
}
</style>
<body>
<div id="update-message" class="update-message"></div>
    <?php include 'header.php'; ?>
    <br><br><br><br>

    <div class="profile-container">
        <h1>User Info</h1>
        
        <form id="profileForm" action="update_profile.php" method="post">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $fullName; ?>" <?php echo isset($_SESSION['edit_mode']) ? '' : 'readonly'; ?>>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" <?php echo isset($_SESSION['edit_mode']) ? '' : 'readonly'; ?>>
            <!-- <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $password; ?>" <?php echo isset($_SESSION['edit_mode']) ? '' : 'readonly'; ?>> -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            
            <?php if (!isset($_SESSION['edit_mode'])) : ?>
                <button type="button" id="editButton">Edit</button>
            <?php else : ?>
                <button type="submit" id="updateButton">Update Profile</button>
            <?php endif; ?>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('editButton');
        const updateButton = document.getElementById('updateButton');
        const inputs = document.querySelectorAll('input[readonly]');

        editButton.addEventListener('click', function () {
            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });

            editButton.setAttribute('disabled', 'true');
            updateButton.removeAttribute('disabled');
        });
    });
</script>

</body>
</html>