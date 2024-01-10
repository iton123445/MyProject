<?php
session_start();
include 'config.php';

// Assuming you have a user ID, replace 1 with the actual user ID or retrieve it from your session
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
// Fetch pending orders for the user with details about the products
$pendingOrdersQuery = "SELECT o.*, oi.*, p.*
                       FROM orders o
                       INNER JOIN order_item oi ON o.orderid = oi.orderid
                       INNER JOIN product p ON oi.pid = p.pid
                       WHERE o.cid = '$userId' AND o.status = 'pending'
                       ORDER BY o.orderid";

$pendingOrdersResult = $conn->query($pendingOrdersQuery);

$cancelledOrdersQuery = "SELECT o.*, oi.*, p.*
                       FROM orders o
                       INNER JOIN order_item oi ON o.orderid = oi.orderid
                       INNER JOIN product p ON oi.pid = p.pid
                       WHERE o.cid = '$userId' AND o.status = 'cancelled'
                       ORDER BY o.orderid";

$cancelledOrdersResult = $conn->query($cancelledOrdersQuery);

$completeOrdersQuery = "SELECT o.*, oi.*, p.*
                       FROM orders o
                       INNER JOIN order_item oi ON o.orderid = oi.orderid
                       INNER JOIN product p ON oi.pid = p.pid
                       WHERE o.cid = '$userId' AND o.status = 'completed'
                       ORDER BY o.orderid";

$completeOrdersResult = $conn->query($completeOrdersQuery);
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
#navbar {
  list-style-type: none;
  left: 0;
  margin: 0;
  padding: 0;
  overflow: hidden;
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

#navbar li {
  float: left;
}

#navbar li a {
  display: block;
  color: white;
  text-align: center;
  padding: 24px 30px;
  text-decoration: none;
}

#navbar li a:hover {
  background-color: #6285f4;
}

/* Tab styles */
ul.tabs {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #f2f2f2;
}

ul.tabs li {
  flex: 1;
  text-align: center;
  padding: 10px;
  cursor: pointer;
  user-select: none;
}

ul.tabs li:hover {
  background-color: #ddd;
}

ul.tabs li.active {
  background-color: #00d4ff; /* Change the background color for the active tab */
  color:#fff;
}

.tab-content {
  display: none;
}

.tab-content.active {
  display: block;
}

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: #ecf0f1;
        }

        h2 {
            color: #3498db;
        }

        h3 {
            color: #3498db;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status-pending {
         
            color: orange;
        }

        .status-completed {
    
            color: green;
        }

        .status-cancelled {
            color: red;
        }

        .grand-total-label {
            font-weight: bold;
            text-align: right;

        }
        .order-table {

        }
         .buy-button {
            margin-top: 10px;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #2980b9;
        }
        .actives {
    background-color:#00d4ff;
    color:#fff;
  }
 
    </style>
</head>
<body>
 <ul id="navbar">
 <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="actives"'; ?>><a href="../index.php">Home</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="actives"'; ?>><a href="../about.php">About</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="actives"'; ?>><a href="../index.php#Contact">Contact</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'wc.php') echo 'class="actives"'; ?>><a href="wc.php">Order Now!</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') echo 'class="actives"'; ?>><a href="cart.php">Cart!</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'order.php') echo 'class="actives"'; ?>><a href="order.php">Bag</a></li>
                      <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                ?>
</ul>

    <br><br><br><br><br>



    <ul class="tabs">
    <li class="tab active" onclick="changeTab('tab1', this)">Pending Orders</li>
  <li class="tab" onclick="changeTab('tab2', this)">Completed Orders</li>
  <li class="tab" onclick="changeTab('tab3', this)">Cancelled Orders</li>
</ul>

<div id="tab1" class="tab-content active">
    <h2 align="center">Your Pending Orders</h2>
<center>
   <?php
// ... (previous code)

if ($pendingOrdersResult->num_rows > 0) {
    // Move the form outside the loop
    echo '<form method="post" action="cancel_order.php" id="cancelOrderForm">';

    $currentOrderId = null; // Keep track of the current order id
    $grandTotal = 0; // Initialize grand total

    while ($order = $pendingOrdersResult->fetch_assoc()) {
        if ($currentOrderId !== $order['orderid']) {
            // Display a new order section when the orderid changes
            if ($currentOrderId !== null) {
                echo '</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="grand-total-label"><strong>Grand Total:</strong></td>
                            <td class="grand-total">$' . $grandTotal . '</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td>
                                <input type="hidden" name="orderId" value="' . $currentOrderId . '">
                                <button type="submit" name="cancelOrder" class="buy-button">Cancel Order</button>
                            </td>
                        </tr>
                    </tfoot>
                </table><br>';  // Display the grand total and close the previous table
                $grandTotal = 0; // Reset grand total for the new order
            }
            $currentOrderId = $order['orderid'];
            // echo '<h3>Order ID: ' . $currentOrderId . '</h3>'; // Display the order id
            echo '<table class="order-table">
                    <thead>
                        <tr>
                            <td colspan="3" align="center"></td>
                            <td colspan="2">Date: ' . $order['order_date'] . '</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>';
        }

        // Increment grand total with the current order item total
        $grandTotal += $order['total'];

        ?>
        <tr>
            <td> <img src="<?php echo $order['img']; ?>" width="80px" height="80px" ></td>
            <td><?php echo $order['pname']; ?></td>
            <td><?php echo $order['quantity']; ?></td>
            <td>$<?php echo $order['price']; ?></td>
            <td>$<?php echo $order['total']; ?></td>
            <td class="<?php echo 'status-' . strtolower($order['status']); ?>"><?php echo $order['status']; ?></td>
            <!-- Display more information about the order as needed -->
            <td></td>
        </tr>
        <?php
    }

   // Display the grand total and cancel button for the last order
    echo '</tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="grand-total-label"><strong>Grand Total:</strong></td>
                    <td class="grand-total">$' . $grandTotal . '</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <input type="hidden" name="orderId" value="' . $currentOrderId . '">
                        <button type="submit" name="cancelOrder" class="buy-button">Cancel Order</button>
                    </td>
                </tr>
            </tfoot>
        </table><br>';
    
    // Close the form outside the loop
    echo '</form>';
} else {
    echo "<p>You have no pending orders.</p>";
}
?>
</div>


<div id="tab2" class="tab-content">
    <h2 align="center">Your Completed Orders</h2>
<center>
   <?php
if ($completeOrdersResult->num_rows > 0) {
    // Move the form outside the loop
    $currentOrderId = null; // Keep track of the current order id
    $grandTotal = 0; // Initialize grand total

    while ($order = $completeOrdersResult->fetch_assoc()) {
        if ($currentOrderId !== $order['orderid']) {
            // Display a new order section when the orderid changes
            if ($currentOrderId !== null) {
                echo '</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                            <td class="grand-total">$' . $grandTotal . '</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table><br>'; // Display the grand total and close the previous table
                $grandTotal = 0; // Reset grand total for the new order
            }
            $currentOrderId = $order['orderid'];
            // echo '<h3>Order ID: ' . $currentOrderId . '</h3>'; // Display the order id
            echo '<table class="order-table">
                    <thead>
                        <tr>
                            <td colspan="3" align="center"></td>
                            <td colspan="2">Date: ' . $order['order_date'] . '</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Status</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>';
        }

        // Increment grand total with the current order item total
        $grandTotal += $order['total'];

        ?>
        <tr>

            <td> <img src="<?php echo $order['img']; ?>" width="80px" height="80px" ></td>
            <td><?php echo $order['pname']; ?></td>
            <td><?php echo $order['quantity']; ?></td>
            <td>$<?php echo $order['price']; ?></td>
            <td>$<?php echo $order['total']; ?></td>
            <td class="<?php echo 'status-' . strtolower($order['status']); ?>"><?php echo $order['status']; ?></td>
            <!-- Display more information about the order as needed -->
    
        </tr>

        <?php
    }

    // Display the grand total and cancel button for the last order
    echo '</tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                    <td class="grand-total">$' . $grandTotal . '</td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table><br>';
    
    // Close the form outside the loop
    echo '</form>';
} else {
    echo "<p>You have no completed orders.</p>";
}
?>

</div>



<div id="tab3" class="tab-content">
    <h2 align="center">Your Cancelled Orders</h2>
<center>
   <?php
if ($cancelledOrdersResult->num_rows > 0) {
    // Move the form outside the loop
    $currentOrderId = null; // Keep track of the current order id
    $grandTotal = 0; // Initialize grand total

    while ($order = $cancelledOrdersResult->fetch_assoc()) {
        if ($currentOrderId !== $order['orderid']) {
            // Display a new order section when the orderid changes
            if ($currentOrderId !== null) {
                echo '</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                            <td class="grand-total">$' . $grandTotal . '</td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table><br>'; // Display the grand total and close the previous table
                $grandTotal = 0; // Reset grand total for the new order
            }
            $currentOrderId = $order['orderid'];
            // echo '<h3>Order ID: ' . $currentOrderId . '</h3>'; // Display the order id
            echo '<table class="order-table">
                    <thead>
                        <tr>
                            <td colspan="3" align="center"></td>
                            <td colspan="2">Date: ' . $order['order_date'] . '</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Status</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>';
        }

        // Increment grand total with the current order item total
        $grandTotal += $order['total'];

        ?>
        <tr>

            <td> <img src="<?php echo $order['img']; ?>" width="80px" height="80px" ></td>
            <td><?php echo $order['pname']; ?></td>
            <td><?php echo $order['quantity']; ?></td>
            <td>$<?php echo $order['price']; ?></td>
            <td>$<?php echo $order['total']; ?></td>
            <td class="<?php echo 'status-' . strtolower($order['status']); ?>"><?php echo $order['status']; ?></td>
            <!-- Display more information about the order as needed -->
        </tr>

        <?php
    }

    // Display the grand total and cancel button for the last order
    echo '</tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                    <td class="grand-total">$' . $grandTotal . '</td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table><br>';
    
    // Close the form outside the loop
    echo '</form>';
} else {
    echo "<p>You have no completed orders.</p>";
}
?>

</div>
</body>
</html>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Set the default active tab and tab content
    var defaultTab = document.querySelector('.tab.active');
    var defaultTabId = defaultTab.getAttribute('onclick').match(/changeTab\('([^']+)'/)[1];
    var defaultTabContent = document.getElementById(defaultTabId);

    // Hide all tab content
    var tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(function(content) {
      content.classList.remove('active');
    });

    // Show the default tab content
    defaultTabContent.classList.add('active');
  });

  function changeTab(tabId, clickedTab) {
    // Hide all tab content
    var tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(function(content) {
      content.classList.remove('active');
    });

    // Remove 'active' class from all tabs
    var tabs = document.querySelectorAll('.tab');
    tabs.forEach(function(tab) {
      tab.classList.remove('active');
    });

    // Show the selected tab content
    var selectedTabContent = document.getElementById(tabId);
    selectedTabContent.classList.add('active');

    // Add 'active' class to the clicked tab
    clickedTab.classList.add('active');
  }
</script>