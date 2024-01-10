<?php

session_start();
include 'php/config.php';
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
    <link rel="icon" type="image/x-icon" href="image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Aqua Delivery Iligan City</title>
</head>

<style>
  
  ul {
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

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
   padding: 24px 20px;
  text-decoration: none;
}

li a:hover {
  background-color: #6285f4;
}

p.bg {
   font-size: 181px;
   line-height: 130px;
   font-weight: 600;
   text-transform: uppercase;
   background: url(https://media.tenor.com/8x5b-Zwr7IQAAAAC/slow-motion.gif.gif) center 60%/ cover no-repeat;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-family: "Lucida Handwriting";
   margin-top:53px;
   margin-bottom:8px;
}
.main {
  padding: 16px;
  margin-top: 15px;
  height: 1022px; 
}
.about {
  border: gray;

}
.about p {
  text-indent: 50px;
  text-align: justify;
  letter-spacing: 3px;
}
.about h1 {
  text-align: center;
  text-transform: uppercase;
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
  -webkit-text-fill-color: transparent;
  background-image: linear-gradient(101deg, #7676f2, #00d4ff);
}
.container {
  border: 2px solid #ccc;
  background-color: #eee;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  margin-right: 20px;
  border-radius: 25%;
}

.container span {
  font-size: 20px;
  margin-right: 15px;
}

            
.shape {
  width: 100px;
  height: 100px;
  background: url(https://scontent.fceb1-1.fna.fbcdn.net/v/t1.6435-9/105388611_1638865089610172_732090850237885786_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=7a1959&_nc_eui2=AeF1WdDmYzO31xS8pwlSLwXPoM_X6NtPL22gz9fo208vbU668gSsvRZHqpvZeIwceiMmRFc2TIWVfAYVR6XCz4Ow&_nc_ohc=Fa0eE_d4ixQAX9Zhf0z&_nc_ht=scontent.fceb1-1.fna&oh=00_AfBZpyZuziF3TQLUPB89XkHgfx2PIyahh0dbBd8M3Bj6PA&oe=65A7E65E)60% center;
  border-radius: 50%;
  border-top-right-radius: 0;
  transform: rotate(-45deg);
  float: left;
  margin-top: 30px;
  margin-left: 20px;

  background-size: cover;
  margin-right: 20px;
  border: 5px solid #33abfa;
  
}
.shape:hover {
            transform: scaleX(1);
        }

        .shape2 {
  width: 100px;
  height: 100px;
  background: url(https://i.mydramalist.com/QW1QW_5f.jpg)60% center;
  border-radius: 50%;
  border-top-right-radius: 0;
  transform: rotate(-45deg);
  float: left;
  margin-top: 30px;
  margin-left: 20px;

  background-size: cover;
  margin-right: 20px;
  border: 5px solid #33abfa;
  
}
.shape2:hover {
            transform: scaleX(1);
        }

        .shape3 {
  width: 100px;
  height: 100px;
  background: url(https://i.pinimg.com/736x/64/c8/15/64c8155555d49d853b05daba134a031c.jpg)60% center;
  border-radius: 50%;
  border-top-right-radius: 0;
  transform: rotate(-45deg);
  float: left;
  margin-top: 30px;
  margin-left: 20px;

  background-size: cover;
  margin-right: 20px;
  border: 5px solid #33abfa;
  
}
.shape3:hover {
            transform: scaleX(1);
        }


input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #33abfa;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #6285f4;
}

.containers {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.header1 {
    text-align: center;
  text-transform: uppercase;
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
  -webkit-text-fill-color: transparent;
  background-image: linear-gradient(101deg, #7676f2, #00d4ff);
}

.social-icons {
  display: flex;
}

.fa {
  padding: 10px;
  font-size: 13px;
  width: 13px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
  opacity: 0.7;
}

.fa-facebook {
  background: #6285f4;
  color: white;
}

.fa-instagram {
  background: #6285f4;
  color: white;

}

.lgo {
    margin-bottom: -6.0%;
    margin-left: -8.2%;
}
.about img {
    filter: drop-shadow(0px 8px 16px rgba(0, 0, 0, 0.1)); 
            transition: transform 0.1s ease; 
}
.about img:hover {
            transform: scaleX(-1);
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
            background-color: #ff4444;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .about {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 50px;
}

.description {
    width: 40%;
    text-align: left;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.about img {
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.active {
  background-color:#00d4ff;
  color:#fff;
}
li.login {
  float: right;
}
</style>
<body>
    <div class="main">
        <ul>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>><a href="about.php">About</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?>><a href="#Contact">Contact</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'php/wc.php') echo 'class="active"'; ?>><a href="php/wc.php">Order Now!</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') echo 'class="active"'; ?>><a href="php/cart.php">Cart <span id="countcartno"><?php echo $cartCount; ?></span></a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'php/order.php') echo 'class="active"'; ?>><a href="php/order.php">Bag</a></li>
        
        <?php
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            echo '<li><a href="php/login.php">Sign In/Sign Out</a></li>';
        }
        ?>
             <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            echo '<li><a href="php/logout.php">Logout</a></li>';
        }
        ?>
        </ul>
            <br><br><br><br>
                <h1 class="header1">BEST SELLERS</h1>
                <hr>
        <div class="product-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    ?>
                    <div class="product-card">
                        <form action="php/insert_cart_items.php" method="post">
                            <img class="product-image" src="img/<?php echo $row['img']; ?>" alt="<?php echo $row['pname']; ?>">
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
        <hr>
        <center>
            <img class="lgo" src="image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png" alt="logo" width="15%" height="20%">
            <div class="firstimg">
                <p class="bg">Best <br>Aqua <br>Delivery <br>in Iligan City</p>
            </div>
        </center>

        <div class="about">
        <center><img src="https://ofwnewsbeat.com/wp-content/uploads/2018/02/GQ-West-Launches-Aquabest-and-Laundrybest-SM-Sea-Residences-7.jpg" alt="logo" width="80%"></center>
        <div class="description">
            <p>Welcome to our world of excellence!</p>
            <p>At our core, we are driven by a commitment to quality and service. The image you see on the right encapsulates our brand, symbolizing the heights of innovation and sophistication we strive for.</p>
            <p>Founded with a vision to redefine industry standards, our journey is marked by milestones of success and customer satisfaction. We take pride in the trust our customers place in us, and we reciprocate by delivering products and services that surpass expectations.</p>
            <p>As the image suggests, we stand tall and confident, reaching new horizons. The vibrant hues reflect our dynamic approach, and the water imagery signifies the purity and clarity we bring to everything we do.</p>
            <p>Explore our offerings, and you'll discover a world where quality meets convenience. Join us on this journey, and experience the difference that sets us apart.</p>
        </div>
    </div>



        <?php
       $cartItemsQuery = "SELECT c.cartid, c.pid, c.quantity, c.price, c.total, c.cid,p.pname, p.pprice
                   FROM cart c
                   INNER JOIN product p ON c.pid = p.pid WHERE c.cid = '$userId' ";
$cartItemsResult = $conn->query($cartItemsQuery);

$cartItems = [];
while ($row = $cartItemsResult->fetch_assoc()) {
    $cartItems[] = $row;
}
        ?>

 <div class="sidebar" id="cart-sidebar">
    <h2 align="center">Cart List</h2>
    <div id="cart-items"></div>
    <a href="php/cart.php"><button class="buy-button">View Cart</button></a>
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
                <form action="php/delete_cart_item.php" method="post">
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
<div class="shape2"></div>
  <p><span>Rebecca Flex.</span><i> Rating: 4/5</i></p>
  <p>I recently tried Best Aqua Delivery, and overall, it's been a positive experience. The water quality is excellent, and the delivery was prompt. The pricing is reasonable too. My only suggestion would be to enhance the communication process. A tracking system or delivery updates would be a great addition. Nonetheless, I'm happy with the service and will continue using it!</p>
</div>

<div class="container">
<div class="shape3"></div>
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
            
<!-- <div class="footer">
  <div class="footer-content">
    <p class="footer-text">Created by: @Jeff</p>
  </div>
  <div class="social-icons">
    <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-facebook"  target="_blank"></a>
    <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-instagram"  target="_blank"></a>
  </div>
</div>
 -->

</div>

</body>
</html>