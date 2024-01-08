<?php
include 'config.php';

$cartItemsQuery = "SELECT c.cartid, c.pid, c.quantity, c.price, c.total, p.pname, p.pprice,p.img
                   FROM cart c
                   INNER JOIN product p ON c.pid = p.pid";
$cartItemsResult = $conn->query($cartItemsQuery);
$grandTotal = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <title>Iton's Website</title>
</head>
<body>
  <div id="update-message" class="update-message"></div>
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="../about.html">About</a></li>
        <li><a href="#Contact">Contact</a></li>
        <li><a href="wc.php">Order Now!</a></li>
        <li><a href="cart.php">Cart!</a></li>
    </ul>
    <br><br><br><br>

    <h2 align="center">Your Cart!</h2>

    <form action="update_quantity.php" method="post">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($cartItemsResult->num_rows > 0) {
                    while ($cartItem = $cartItemsResult->fetch_assoc()) {
                        $grandTotal += $cartItem['total'];
                        ?>
                        <tr>
                            <td>
                                <img src="<?php echo $cartItem['img']; ?>" alt="<?php echo $cartItem['pname']; ?>">
                                <div class="item-details">
                                    <h3><?php echo $cartItem['pname']; ?></h3>
                                </div>
                            </td>
                          <td>
    <input type="number" class="quantity-input" name="quantity[<?php echo $cartItem['pid']; ?>]" value="<?php echo $cartItem['quantity']; ?>" min="1">
    <input type="hidden" name="price[<?php echo $cartItem['pid']; ?>]" value="<?php echo $cartItem['pprice']; ?>">
</td>


                            <td>$<?php echo $cartItem['pprice']; ?></td>
                            <td>$<?php echo $cartItem['total']; ?></td>

                            <td>
                                <button type="submit" name="update_quantity" value="<?php echo $cartItem['pid']; ?>" class="update-button">Update</button>
                                <button type="submit" name="remove_from_cart" value="<?php echo $cartItem['pid']; ?>" class="remove-button">Remove</button>
                            </td>
                        </tr>
                        <?php
                    }

                    ?>
                    </form>
                    <tr>
                        <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                        <td colspan="" >$<?php echo $grandTotal; ?></td>
                    </tr>

                    <?php
                } else {
                    echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <center>
            <a href="checkout.php"><button class="buy-button" align="">Proceed to Checkout</button></a>
        </center>
    
</body>
</html>
