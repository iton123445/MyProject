<?php include 'config.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$conn->close();
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
.product-container {
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
            width: 150px;
            height: 150px;
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
<center>
<img class="lgo" src="../image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png" alt="logo" width="15%" height="20%">
<div class="firstimg">
 
<p class="bg">Best <br>Aqua <br>Delivery <br>in Iligan City</p>

</div>
</center>

<div class="about">
<center><img  src="https://ofwnewsbeat.com/wp-content/uploads/2018/02/GQ-West-Launches-Aquabest-and-Laundrybest-SM-Sea-Residences-7.jpg" alt="logo" width="80%"></center>
<div style="font-family: Arial, sans-serif; max-width: 90%; margin: 0 auto; text-align: justify; line-height: 1.6;">
    <p style="font-size: 18px;"><strong>Welcome to Best Aqua Delivery</strong>, your trusted source for pure and refreshing water right at your doorstep in Iligan City. At Best Aqua, we understand the importance of staying hydrated with clean and high-quality water, and we are dedicated to making this essential resource easily accessible to you.</p>

    <p style="font-size: 18px; margin-top: 20px;"><strong>Our Commitment to Purity</strong>: We take pride in delivering water that goes through rigorous purification processes, ensuring that every drop is free from impurities and contaminants. Our commitment to quality is unwavering, as we believe that your well-being starts with the water you consume.</p>

    <p style="font-size: 18px; margin-top: 20px;"><strong>Convenience Redefined</strong>: Say goodbye to the hassle of lugging heavy water bottles from the store. Best Aqua Delivery brings convenience to your life by delivering crisp and pure water directly to your home or office. Our efficient and reliable delivery service is designed to meet your hydration needs seamlessly.</p>

    <p style="font-size: 18px; margin-top: 20px;"><strong>Local Roots, Global Standards</strong>: Born in Iligan City, we are deeply rooted in our local community. Our water is sourced responsibly, and our operations adhere to the highest global standards of hygiene and safety. We are not just a delivery service; we are a part of the community, and we take pride in contributing to the health and well-being of Iligan City residents.</p>

    <p style="font-size: 18px; margin-top: 20px;"><strong>Customer-Centric Approach</strong>: At Best Aqua, customer satisfaction is our priority. We strive to exceed your expectations with every delivery. Our friendly and professional team is here to ensure a seamless experience, from placing your order to enjoying a glass of our premium water.</p>

    <p style="font-size: 18px; margin-top: 20px;"><strong>Environmental Responsibility</strong>: Beyond delivering quality water, we are committed to environmental responsibility. Our packaging is designed with sustainability in mind, and we actively seek ways to minimize our ecological footprint. Join us in our mission to hydrate responsibly.</p>

    <p style="font-size: 18px; margin-top: 20px;">Choose Best Aqua Delivery for a hydration experience that combines quality, convenience, and community. Trust us to keep your glasses full and your well-being a top priority.</p>
</div>

</div>
<h1 class="header1">BEST SELLERS</h1>
<div class="product-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
            <div class="product-card">
                    <img class="product-image" src="<?php echo $row['img']; ?>" alt="<?php echo $row['pname']; ?>">
                    <div class="product-title"><?php echo $row['pname']; ?></div>
                    <div class="product-description"><?php echo $row['pdesciption']; ?></div>
                    <div class="product-price">$<?php echo $row['pprice']; ?></div>
                    <button class="buy-button" onclick="addToCart(<?php echo $row['pid']; ?>, '<?php echo $row['pname']; ?>', <?php echo $row['pprice']; ?>)">Add to Cart</button>
                </div>
                <?php
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
    <div class="sidebar" id="cart-sidebar">
      <form action="cart.php">
    <h2 align="center">Cart List</h2>
        <div id="cart-items"></div>
        <button class="buy-button" >View Cart</button>
        <button class="buy-button" >Proceed Checkout</button>
        </form>
    </div>
    <script>
        function addToCart(productId, productName, productPrice) {
            var cartItemsContainer = document.getElementById('cart-items');
            var sidebar = document.getElementById('cart-sidebar');

            // Check if the item is already in the cart
            var existingCartItem = document.querySelector(`[data-product-id="${productId}"]`);

            if (existingCartItem) {
                // If the item is already in the cart, increase the quantity
                var quantityElement = existingCartItem.querySelector('.quantity');
                quantityElement.textContent = parseInt(quantityElement.textContent) + 1;
            } else {
                // If the item is not in the cart, create a new cart item
                var cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.setAttribute('data-product-id', productId);
                cartItem.innerHTML = `
                    <span>${productName}</span>
                    <span>$${productPrice}</span>
                    <span class="quantity">1</span>
                    <button class="remove-button" onclick="removeFromCart(${productId})">Remove</button>
                `;
                cartItemsContainer.appendChild(cartItem);
            }

            // Show the sidebar if there are items in the cart
            sidebar.style.display = 'block';
        }

        function removeFromCart(productId) {
            var cartItem = document.querySelector(`[data-product-id="${productId}"]`);
            var cartItemsContainer = document.getElementById('cart-items');
            var sidebar = document.getElementById('cart-sidebar');

            if (cartItem) {
                // Remove the cart item from the cart
                cartItem.remove();

                // Hide the sidebar if there are no items in the cart
                if (cartItemsContainer.children.length === 0) {
                    sidebar.style.display = 'none';
                }
            }
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