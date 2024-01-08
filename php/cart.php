<?php
include 'config.php';

$cartItemsQuery = "SELECT c.cartid, c.pid, c.quantity, c.price, c.total, p.pname, p.pprice,p.img
                   FROM cart c
                   INNER JOIN product p ON c.pid = p.pid";
$cartItemsResult = $conn->query($cartItemsQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Iton's Website</title>
</head>
<style>
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
  .cart-items-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .cart-item {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 10px;
            width: 300px;
            text-align: center;
        }

        .cart-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .item-details h3 {
            margin: 0;
        }

        .item-details p {
            margin: 5px 0;
        }

        .remove-button {
            background-color: #ff4444;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
          .update-button {
            background-color: #4285f4;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
        }
</style>

<body>
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
 <div class="cart-items-container">
            <?php
            if ($cartItemsResult->num_rows > 0) {
                while ($cartItem = $cartItemsResult->fetch_assoc()) {
                    ?>
                    <div class="cart-item">
                        <img src="<?php echo $cartItem['img']; ?>" alt="<?php echo $cartItem['pname']; ?>">
                        <div class="item-details">
                            <h3><?php echo $cartItem['pname']; ?></h3>
                             <p>
                                    Quantity: 
                                    <input type="number" class="quantity-input" name="quantity[<?php echo $cartItem['pid']; ?>]" value="<?php echo $cartItem['quantity']; ?>" min="1">
                                </p>
                            <p>Price: $<?php echo $cartItem['pprice']; ?></p>
                            <p>Total: $<?php echo $cartItem['total']; ?></p>
                        </div>
                        <button class="update-button" onclick="updateQuantity(<?php echo $cartItem['pid']; ?>)">Update</button>
                        <button class="remove-button" onclick="removeFromCart(<?php echo $cartItem['pid']; ?>)">Remove</button>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
        </div>
           </form>
        <a href="checkout.php"><button class="buy-button">Proceed to Checkout</button></a>
    </div>

