<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "water";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
function getCartItemCount($userId, $conn) {
  $countQuery = "SELECT COUNT(*) as count FROM cart WHERE cid = '$userId'";
  $countResult = $conn->query($countQuery);

  if ($countResult->num_rows > 0) {
      $count = $countResult->fetch_assoc()['count'];
      return $count;
  }

  return 0;
}
?>