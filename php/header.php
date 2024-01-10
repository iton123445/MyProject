<ul>
  <!-- <li><a class="active" href="../index.php">Home</a></li>
  <li><a href="../about.html">About</a></li>
  <li><a href="../index.php#Contact">Contact</a></li>
  <li><a href="wc.php">Order Now!</a></li>
  <li><a href="cart.php">Cart!</a></li>
  <li><a href="logout.php">Logout</a></li> -->

  <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="../index.php">Home</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>><a href="../about.php">About</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="../index.php#Contact">Contact</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'wc.php') echo 'class="active"'; ?>><a href="wc.php">Order Now!</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') echo 'class="active"'; ?>><a href="cart.php">Cart <span id="countcartno"><?php echo $cartCount; ?></span></a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'order.php') echo 'class="active"'; ?>><a href="order.php">Bag</a></li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'profile.php') echo 'class="active"'; ?>><a href="profile.php">Profile</a></li>
                <?php 
                    }
                ?>
                      <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                ?>
</ul>

