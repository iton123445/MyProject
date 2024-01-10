<?php
session_start();
include 'config.php';
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$cartItemsQuery = "SELECT c.cartid, c.pid, c.quantity, c.price, c.total, p.pname, p.pprice, p.img FROM cart c
INNER JOIN product p ON c.pid = p.pid WHERE c.cid = '$userId' ";
$cartItemsResult = $conn->query($cartItemsQuery);
$grandTotal = 0;
$cartCount = getCartItemCount($userId, $conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Aqua Delivery Iligan City</title>
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <title>Iton's Website</title>
</head>
<body>
  <div id="update-message" class="update-message"></div>
  <?php include 'header.php'; ?>
    <br><br><br><br>

    <h2 align="center">Your Cart!</h2>

    <form action="update_quantity.php" method="post" id="cartForm">
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
                $cartItems = [];
                if ($cartItemsResult->num_rows > 0) {
                    while ($cartItem = $cartItemsResult->fetch_assoc()) {
                        $grandTotal += $cartItem['total'];
                        $cartItems[] = $cartItem;
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
                
                    <tr>
                        <td colspan="3" class="grand-total-label"><strong>Grand Total:</strong></td>
                        <td colspan="" >$<?php echo $grandTotal; ?></td>
                    </tr>

                    <?php
                    $_SESSION['cartItems'] = $cartItems;
                }


                 else {
                    echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                }
                $_SESSION['cartItems'] = $cartItems;
                ?>
            </tbody>
        </table>

 <center>
        <?php if ($userId == 0) : ?>
          <p class="buy-button" >Please <a style="color:white;"href="login.php?redirect=checkout.php">log in</a> or <a style="color:white;" href="register.php?redirect=checkout.php" >register</a> to proceed to checkout.</p> 
        <?php else : ?>
            <button type="submit" class="buy-button" formaction="checkout.php" name="checkout">Proceed to Checkout</button>
        <?php endif; ?>
    </center>

    </form>
    
</body>
</html>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
