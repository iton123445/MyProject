<?php 
include 'config.php';
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="column" style="background-color:#eee;" align="center">';
        echo '<h2>' . $row['pname'] . '</h2>';
        echo '<p><img src="' . $row['img'] . '" alt="bottle" height="150px"></p>';
        echo '<button class="refillButton" data-product-id="' . $row['pid'] . '" style="display: flex;justify-content: space-between;width: 120px;height: 40px;align-content: space-around;align-items: center;">';
        echo '<span>Refill Now!</span>';
        echo '<img src="../image/refill_button.png" alt="Refill Now!" style="transform: rotate(30deg); width: 28px; height: 28px;">';
        echo '</button>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
