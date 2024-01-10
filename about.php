<?php

session_start();
include 'php/config.php';

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$cartCount = getCartItemCount($userId, $conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | AquaFresh Delivery</title>
    <link rel="icon" type="image/x-icon" href="image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .main {
            max-width: 100%;
            margin: 20px auto;
            padding: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
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

        
        h1 {
            color: #3498db;
        }

        img.slider-img {
            width: 65%;
            height: 500px;
            border-radius: 5px;
            margin-top: 20px;
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        h2, h3 {
            color: #3498db;
        }

        .containers {
            margin-top: 20px;
        }

        .how-it-works h2 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .step {
            flex: 0 0 30%;
        }

        .footer {
       background-image: linear-gradient(
      rgba(255, 255, 255, 0),
      rgba(255, 255, 255, 0)
    ),
    linear-gradient(101deg, #7676f2, #00d4ff);
    display: flex;
  justify-content: space-between;
  align-items: center;
   left: 0;
        }

        .social-icons a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }
        .active {
  background-color:#00d4ff;
  color:#fff;
}
    </style>
</head>

<body>
    <div class="main">
        <ul>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>><a href="about.php">About</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="index.php#Contact">Contact</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'php/wc.php') echo 'class="active"'; ?>><a href="php/wc.php">Order Now!</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') echo 'class="active"'; ?>><a href="cart.php">Cart <span id="countcartno"><?php echo $cartCount; ?></span></a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'php/order.php') echo 'class="active"'; ?>><a href="php/order.php">Bag</a></li>
                      <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="php/logout.php">Logout</a></li>';
                }
                ?>
                </ul>
        <h1 class="header1" style="padding-top: 2%; margin-bottom: -3%; text-align:center;">About us </h1><br><br><br><br>
        <center>
        <img class="slider-img" src="https://myfoodhub.files.wordpress.com/2012/06/alkaline-water-refilling-station.jpg" alt="Water Refill Station" >
    </center>
        <h1>Welcome to AquaFresh Delivery: Your Hydration, Delivered.</h1>
        <p>Where we seamlessly merge convenience with hydration, establishing ourselves as your steadfast companion in effortlessly quenching your thirst. Recognizing the pivotal role that clean and invigorating water plays in your daily life, AquaFresh Delivery introduces the revolutionary water refilling system right to your doorstep, setting a new standard in the realm of hydration.</p>

        <h2>Why AquaFresh Delivery?</h2>
        <p>At AquaFresh, we've redefined the way you experience hydration. Our water refilling system ensures that you have access to pure, high-quality water whenever you need it. Say goodbye to the hassle of carrying heavy water bottles or worrying about running out of water. With AquaFresh Delivery, hydration is just a click away.</p>
        <p>Our commitment to excellence extends beyond mere convenience. AquaFresh employs advanced purification processes that guarantee every drop you receive is free from impurities, upholding the highest standards of quality. Revel in the convenience of tailored deliveries that align with your preferences. Customize your delivery frequency, select your preferred water type, and leave the logistics to us.</p>
        <p>By choosing AquaFresh Delivery, you are not just investing in personal convenience; you are actively contributing to a sustainable future. Our dedication to reducing plastic waste ensures that you receive fresh, pure water in reusable containers, championing an eco-friendly approach that minimizes environmental impact.</p>
        
        <p>Curious about how it works? Simply peruse our selection of purified water options and effortlessly place your order online or through our user-friendly mobile app. Select a delivery schedule that seamlessly integrates with your lifestyle, and we'll ensure your water refilling system is replenished without you having to lift a finger. Revel in the ease of having clean water on tap, with our dedicated delivery team guaranteeing that your water refilling system is meticulously maintained for optimal performance.</p>
        
        <p>Embark on a journey of hassle-free hydration with AquaFresh Delivery today. Discover the joy of having pure, refreshing water at your fingertips and become part of our community of satisfied customers who have unequivocally chosen AquaFresh as their preferred water delivery service.</p>
        
        <p>Because your hydration matters to us, AquaFresh Delivery is where purity meets convenience, ensuring that you experience the epitome of hassle-free hydration.</p>
        
        <div class="containers">
            <div class="how-it-works">
                <h2>How It Works:</h2>
            </div>
            <div class="steps">
                <div class="step">
                    <h3>Place Your Order</h3>
                    <p>Browse our selection of purified water options and place your order online or through our mobile app.</p>
                </div>
                <div class="step">
                    <h3>Scheduled Deliveries</h3>
                    <p>Choose a delivery schedule that suits your lifestyle. We'll make sure your water refilling system is replenished without you lifting a finger.</p>
                </div>
                <div class="step">
                    <h3>Enjoy Hassle-Free Hydration</h3>
                    <p>Experience the ease of having clean water on tap. Our delivery team ensures that your water refilling system is efficiently maintained for optimal performance.</p>
                </div>
            </div>
            <div class="join-us">
                <h3>Join the AquaFresh Family Today!</h3>
                <p>Embark on a journey of hassle-free hydration with AquaFresh Delivery. Discover the joy of having pure, refreshing water at your fingertips. Join our community of satisfied customers who have made AquaFresh their preferred choice for water delivery.</p>
                <p>Your hydration matters to us. AquaFresh Delivery – where purity meets convenience.</p>
            </div>
        </div>
        
        
    </div>
    <!-- <div class="footer">
            <div class="footer-content">
                
                <p class="footer-text">Created by: @Jeff All rights reserved 2024</p>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-facebook" target="_blank"></a>
                <a href="https://www.facebook.com/jhaysziealek.ceballos" class="fa fa-instagram" target="_blank"></a>
            </div>
        </div> -->
</body>
</html>

<script>

    var images = [
        'https://myfoodhub.files.wordpress.com/2012/06/alkaline-water-refilling-station.jpg',
        'https://cvsu.edu.ph/wp-content/uploads/2022/10/530A5117-scaled.jpg', 
        'https://netstorage-kami.akamaized.net/images/4700acaf794300f2.jpg?imwidth=900',
        'https://i.shgcdn.com/30c4fe6d-b223-46f1-8394-623ea24addb3/-/format/auto/-/preview/3000x3000/-/quality/lighter/',
        'https://files01.pna.gov.ph/source/2020/07/28/053a0571.jpg',
        'https://web.z.com/ph/wp/wp-content/uploads/2022/11/AdobeStock_448944132-1.jpeg',
        'https://lh5.googleusercontent.com/p/AF1QipPEMyzz2f6_EOvuuvRJ3zC2WiEwu_mJORPWnipO=w1440-h810-k-no',
        'https://urbanoasis.la/wp-content/uploads/2019/06/house-water-system--e1561658557771.jpg',
    ];

    var currentImageIndex = 0;
    var imgElement = document.querySelector('.slider-img');

    function changeImage() {
    
        imgElement.src = images[currentImageIndex];

        currentImageIndex++;
        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }
    }


    setInterval(changeImage, 1500);
</script>