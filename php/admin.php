<?php include 'config.php';

session_start();
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data when the form is submitted
    if (isset($_POST["updateStatus"])) {
        $orderId = $_POST["orderId"];
        $newStatus = $_POST["newStatus"];

        // Update order status in the orders table
        $updateOrderQuery = "UPDATE orders SET status = '$newStatus' WHERE orderid = $orderId";
        $conn->query($updateOrderQuery);

        // If the new status is 'completed', also update payment status to 'completed'
        if ($newStatus == 'completed') {
            $updatePaymentQuery = "UPDATE payment SET payment_status = 'completed' WHERE order_id = $orderId";
            $conn->query($updatePaymentQuery);
        }
    }
}

// Fetch orders and display them in the admin page
$fetchOrdersQuery = "SELECT orders.*, customer.cfullname FROM orders JOIN customer ON orders.cid = customer.cid";
$result = $conn->query($fetchOrdersQuery);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Aqua Delivery Iligan City</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #0066cc;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
        }

        .tab {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            background-color: #ddd;
        }

        .tab:hover {
            background-color: #ccc;
        }

        .tab.active {
            background-color: #0066cc;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0066cc;
            color: white;
        }

        tr.pending td:nth-child(3) {
            color: #ff9800; /* Orange text color for pending status */
        }

        tr.completed td:nth-child(3) {
            color: #2e7d32; /* Dark green text color for completed status */
        }

        tr.cancelled td:nth-child(3) {
            color: #c62828; /* Dark red text color for cancelled status */
        }

        form {
            margin: 0;
            padding: 0;
        }

        select, input[type=submit] {
            padding: 8px;
            margin: 5px;
            font-size: 14px;
            
        }
        input[type=submit] {
            background-image: linear-gradient(
    rgba(255, 255, 255, 0),
    rgba(255, 255, 255, 0)
  ),
  linear-gradient(101deg, #7676f2, #00d4ff);
            
        }

            .success-message {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1;
            animation: fadeInOut 2s linear;
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0;
            }
            10%, 90% {
                opacity: 1;
            }
        }
        .tab.active {
    background-color: #0066cc;
    color: white;
}
.homebutton {
  border-radius: 4px;
 
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 4px;

  left: 20px;
  background-image: linear-gradient(
      rgba(255, 255, 255, 0),
      rgba(255, 255, 255, 0)
    ),
    linear-gradient(101deg, #7676f2, #00d4ff);
}

.homebutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.homebutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;

  right: -20px;
  transition: 0.5s;
}

.homebutton:hover span {
  padding-right: 25px;
}

.homebutton:hover span:after {
  opacity: 1;
  right: 0;
}
    </style>
</head>
<body>
    <br>
    <h2>Admin Page - Manage Orders</h2>
    <br>
    <a href="refill.php" class="homebutton"><span>Create Order </span></a><br><br> <br>
    <div class="tabs">
    <div class="tab pending active" onclick="showTab('pending')">Pending</div>
    <div class="tab completed" onclick="showTab('completed')">Completed</div>
    <div class="tab cancelled" onclick="showTab('cancelled')">Cancelled</div>
</div>


    <table id="pendingTab" class="order-table">
        <?php displayOrders('pending', true); ?>
    </table>

    <table id="completedTab" class="order-table" style="display: none;">
        <?php displayOrders('completed', false); ?>
    </table>

    <table id="cancelledTab" class="order-table" style="display: none;">
        <?php displayOrders('cancelled', false); ?>
    </table>
     <div class="success-message" id="successMessage">Status updated successfully!</div>
     <script>
    function showTab(tabName) {
        document.querySelectorAll('.order-table').forEach(tab => {
            tab.style.display = 'none';
        });

        document.getElementById(tabName + 'Tab').style.display = 'table';

        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelector('.tab.' + tabName).classList.add('active');
    }
</script>



</body>
</html>

<?php
function displayOrders($status, $showActionButtons) {
    global $conn;

    $fetchOrdersQuery = "SELECT orders.*, customer.cfullname FROM orders JOIN customer ON orders.cid = customer.cid WHERE orders.status = '$status' ORDER BY orders.orderid DESC";
    $result = $conn->query($fetchOrdersQuery);

    echo "<tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Ordered Items</th>";

    if ($showActionButtons) {
        echo "<th>Action</th>";
    }

    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        $orderId = $row['orderid'];

        // Fetch order items outside the loop
        $fetchOrderItemsQuery = "SELECT * FROM order_item  
                                JOIN product ON order_item.pid = product.pid 
                                WHERE order_item.orderid = $orderId";
        $orderItemsResult = $conn->query($fetchOrderItemsQuery);

        $statusClass = strtolower($status);
        echo "<tr class='$statusClass'>";
        echo "<td>{$row['orderid']}</td>";
        echo "<td>{$row['cfullname']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>{$row['order_date']}</td>";

        echo "<td>";
        while ($item = $orderItemsResult->fetch_assoc()) {
            echo "{$item['quantity']} x {$item['pname']} ({$item['price']})<br>";
        }
        echo "</td>";

        if ($showActionButtons) {
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='orderId' value='{$row['orderid']}'>
                        <select name='newStatus'>
                            <option value='pending'>Pending</option>
                            <option value='completed'>Completed</option>
                            <option value='cancelled'>Cancelled</option>
                        </select>
                        <input type='submit' name='updateStatus' value='Update'>
                    </form>
                  </td>";
        }

        echo "</tr>";
    }
}
?>

<script type="text/javascript">
    const inputs = document.querySelectorAll("input");
inputs.forEach(function (input) {
  input.addEventListener("focus", function () {
    const parentElement = input.parentElement.parentElement;
    parentElement.classList.add("box-animation");
  });
  input.addEventListener("blur", function () {
    const parentElement = input.parentElement.parentElement;
    parentElement.classList.remove("box-animation");
  });
});

const buttons = document.querySelectorAll("#multiple-btn button");
const form_container = document.getElementById('form_section')
buttons.forEach((button) => {
button.addEventListener("click", () => {
form_container.classList.toggle("left-right");

});
});
</script>