<?php
include 'config.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Aqua Delivery Iligan City</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/home.css">
<style>

</style>
<body>
    <div class="main">
        <ul>
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="#Contact">Contact</a></li>
            <li><a href="wc.php">Order Now!</a></li>
            <li><a href="cart.php">Cart!</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
            <br><br><br><br>
                <h1 class="header1">BEST SELLERS</h1>
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
        <center>
            <img class="lgo" src="../image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png" alt="logo" width="15%" height="20%">
            <div class="firstimg">
                <p class="bg">Best <br>Aqua <br>Delivery <br>in Iligan City</p>
            </div>
        </center>

        <div class="about">
            <center><img  src="https://ofwnewsbeat.com/wp-content/uploads/2018/02/GQ-West-Launches-Aquabest-and-Laundrybest-SM-Sea-Residences-7.jpg" alt="logo" width="80%"></center>
            <div style="font-family: Arial, sans-serif; max-width: 90%; margin: 0 auto; text-align: justify; line-height: 1.6;">
                <!-- Content of the about section (unchanged) -->
            </div>
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
    <a href="checkout.php"><button class="buy-button">Proceed Checkout</button></a>
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
                    cartItem.innerHTML = `
                        <span>${item.pname}</span>
                        <span>$${item.pprice}</span>
                        <span class="quantity">${item.quantity}</span>
                        <form action="delete_cart_item.php" method="post">
                            <input type="hidden" name="cartid" value="${item.cartid}">
                            <button class="remove-button" type="submit">Remove</button>
                        </form>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                });
            }
        </script>
<h1 class="header1">testimonial</h1>
<div class="container">
  <div class="shape"></div>
  <p><span>Gen</span><i> Rating: 5/5</i></p>
  <p><blockquote>I've been using Best Aqua Delivery for a while now, and I couldn't be happier with their service! The water is always delivered on time, and the quality is exceptional. The convenience of having fresh aqua at my doorstep has made my life so much easier. The delivery staff is friendly and professional. I highly recommend Best Aqua Delivery to anyone looking for reliable and top-notch water delivery service!</blockquote></p>
</div>

<div class="container">
<div class="shape"></div>
  <p><span>Rebecca Flex.</span><i> Rating: 4/5</i></p>
  <p>I recently tried Best Aqua Delivery, and overall, it's been a positive experience. The water quality is excellent, and the delivery was prompt. The pricing is reasonable too. My only suggestion would be to enhance the communication process. A tracking system or delivery updates would be a great addition. Nonetheless, I'm happy with the service and will continue using it!</p>
</div>

<div class="container">
<div class="shape"></div>
  <p><span>Rebecca Flex.</span><i> Rating: 4.5/5</i></p>
  <p>I stumbled upon Best Aqua Delivery a few weeks ago, and it's been a game-changer. The water quality is fantastic, and the delivery is consistently on time. What impressed me the most is the eco-friendly packaging. It's clear that they care about the environment. The website is user-friendly, but I'd love to see more variety in package options. Keep up the great work!</p>
</div>
<h1 class="header1">Contact Us</h1>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d505549.7735997128!2d124.414563!3d8.141368!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325579b328c9540d%3A0xe6e208aba2f0d03b!2sIligan%20City%2C%20Lanao%20del%20Norte%2C%20Philippines!5e0!3m2!1sen!2sus!4v1702921690971!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<div class="containers" id="Contact">
  <form action="/action_page.php">
    <label for="fname">Your Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
            
<div class="footer">
  <div class="footer-content">
    <p class="footer-text">Created by: @Jeff</p>
  </div>
  <div class="social-icons">
    <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-facebook"  target="_blank"></a>
    <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-instagram"  target="_blank"></a>
  </div>
</div>


</div>

</body>
</html>