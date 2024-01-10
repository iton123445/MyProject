<?php
include 'config.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
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
</head>
<!-- <link rel="stylesheet" type="text/css" href="../css/refill.css"> -->
<style type="text/css">
  * {
  box-sizing: border-box;
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
        .sidebar {
            display: none; /* Initially hide the sidebar */
            position: fixed;
            top: 65px;
            right: 0;
            width: 300px;
            background-color: #f4f4f4;
            padding: 20px;
            box-shadow: -5px 0 5px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .remove-button {
            cursor: pointer;
            color: red;
        }
  .product-container {
            margin-top: -14px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .product-card {
            flex: 1; /* Equal-width columns */
            max-width: 300px;
            margin: 20px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center children horizontally */
            text-align: center; /* Center text within the container */
        }

        .product-image {
            width: 64px;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }.remove-button {
            background-color: #ff4444;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

</style>
<body>
  
<?php include 'header.php'; ?>
<br><br><br><br>

<h2 align="center">Pick Your Gallon Size</h2>

   <div class="product-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    ?>
                    <div class="product-card">
                        <form action="insert_cart_items.php" method="post">
                            <img class="product-image" src="<?php echo $row['img']; ?>" alt="<?php echo $row['pname']; ?>">
                            <div class="product-title"><?php echo $row['pname']; ?></div>
                            <div class="product-description"><?php echo $row['pdesciption']; ?></div>
                            <div class="product-price">$<?php echo $row['pprice']; ?></div>
                            <button class="buy-button" onclick="addToCart(<?php echo $row['pid']; ?>, '<?php echo $row['pname']; ?>', <?php echo $row['pprice']; ?>)">Add to Cart</button>
                            <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                            <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                            <input type="hidden" name="pprice" value="<?php echo $row['pprice']; ?>">
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No products found.";
            }
            ?>
        </div>


        <?php
        $cartItemsQuery = "SELECT c.cartid, c.pid, c.quantity, c.price, c.total, p.pname, p.pprice
                           FROM cart c
                           INNER JOIN product p ON c.pid = p.pid";
        $cartItemsResult = $conn->query($cartItemsQuery);

        $cartItems = [];
        while ($row = $cartItemsResult->fetch_assoc()) {
            $cartItems[] = $row;
        }
        ?>

 <div class="sidebar" id="cart-sidebar">
    <h2 align="center">Cart List</h2>
    <div id="cart-items"></div>
    <a href="cart.php"><button class="buy-button">View Cart</button></a>

</div>

<script>
    var cartItems = <?php echo json_encode($cartItems); ?>;
    if (cartItems.length > 0) {
        document.getElementById('cart-sidebar').style.display = 'block';

        // Display cart items in the sidebar
        var cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; // Clear previous content

        cartItems.forEach(function (item) {
            var cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            
            // Calculate total price for the item
            var total = item.quantity * item.pprice;

            cartItem.innerHTML = `
                <span>${item.pname}</span>
                <span>$${item.pprice}</span>
                <span class="quantity">${item.quantity}</span>
                <span class="total">$${total.toFixed(2)}</span> <!-- Display total price -->
                <form action="delete_cart_item.php" method="post">
                    <input type="hidden" name="cartid" value="${item.cartid}">
                    <button class="remove-button" type="submit">Remove</button>
                </form>
            `;
            cartItemsContainer.appendChild(cartItem);
        });
    }
</script>