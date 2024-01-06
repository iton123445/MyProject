<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Iton's Website</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/refill.css">
<body>
  
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="#Contact">Contact</a></li>
  <li><a href="wc.php">Order Now!</a></li>
  <li><a href="cart.php">Cart!</a></li>
  <li><a href="php/logout.php">Logout</a></li>
</ul>
<br><br><br><br>

<h2 align="center">Pick Your Gallon Size</h2>

<div class="row">
  <?php include('get_product.php'); ?>
</div>
  
<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content" align="center">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2 id="modalProductName">Refill Details</h2>
    <p><img id="modalProductImage" alt="bottle" height='150px'></p>
    <!-- Add form for quantity and price input -->
    <form id="refillForm">
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" required>
      <br>
      <label for="price">Price:</label>
      <input type="number" id="price" name="price"  readonly>
      <br>
      <label for="subtotal">SubTotal:</label>
      <input type="number" id="subtotal" name="subtotal" readonly>
      <br>
      <input type="submit" value="Add to Cart">
    </form>
  </div>
</div>

<!-- Add this HTML structure for the sidebar in your refill.php file -->
<div id="sidebarCart">
  <span id="closeSidebar" style="cursor: pointer; float: right;">&times;</span>
  <h2>Your Cart</h2>
  <div id="cartItemList"></div>
</div>

</body>
</html>


<script>

var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var refillButtons = document.getElementsByClassName("refillButton");

for (var i = 0; i < refillButtons.length; i++) {
  refillButtons[i].addEventListener("click", function() {
    var productId = this.getAttribute("data-product-id");

    // Fetch product details using AJAX or any preferred method
    fetchProductDetails(productId);
    
    modal.style.display = "block";
  });
}

span.onclick = function() {
  modal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function fetchProductDetails(productId) {
  // Use AJAX or fetch API to get product details from the server
  // Replace the URL with your actual server endpoint
  fetch('get_product_details.php?productId=' + productId)
    .then(response => response.json())
    .then(data => {
      // Update modal content with product details
      document.getElementById("modalProductName").innerText = data.pname;
      document.getElementById("modalProductImage").src = data.img;
      document.getElementById("quantity").value = 1; // Set default quantity
      document.getElementById("price").value = data.pprice;
      updateSubtotal();
    })
    .catch(error => console.error('Error:', error));
}
function updateSubtotal() {
  var quantity = parseFloat(document.getElementById("quantity").value);
  var price = parseFloat(document.getElementById("price").value);
  var subtotal = quantity * price;

  document.getElementById("subtotal").value = isNaN(subtotal) ? "" : subtotal.toFixed(2);
}

// Event listener for the quantity input
document.getElementById("quantity").addEventListener("input", updateSubtotal);

// Event listener for the refill form submission
document.getElementById("refillForm").addEventListener("submit", function(event) {
  event.preventDefault();
  var quantity = parseFloat(document.getElementById("quantity").value);
  var price = parseFloat(document.getElementById("price").value);

  console.log("Quantity: " + quantity + ", Price: " + price);

  // Additional logic for adding to cart or other actions
  // ...

  modal.style.display = "none";
});
function addToCart(quantity, price, productName) {
  // Display the sidebar if not already visible
  const sidebarCart = document.getElementById("sidebarCart");
  if (!sidebarCart) {
    createSidebar();
  }

  // Create a table element
  const cartTable = document.createElement("table");
  cartTable.border = "1";
  cartTable.classList.add("cart-table");
  // Create header row
  const headerRow = document.createElement("tr");
  const headerQuantity = document.createElement("th");
  headerQuantity.innerText = "Product";
  const headerPrice = document.createElement("th");
  headerPrice.innerText = "Quantity";
  const headerProduct = document.createElement("th");
  headerProduct.innerText = "Price";

  const headerAction = document.createElement("th");
  headerAction.innerText = "Action";

  headerRow.appendChild(headerQuantity);
  headerRow.appendChild(headerPrice);
  headerRow.appendChild(headerProduct);
  headerRow.appendChild(headerAction);
  cartTable.appendChild(headerRow);

  // Create a row for the new item
  const cartItemRow = document.createElement("tr");

  // Product column
  const productColumn = document.createElement("td");
  productColumn.innerText = productName;

  // Quantity column
  const quantityColumn = document.createElement("td");
  quantityColumn.innerText = quantity;

  // Price column
  const priceColumn = document.createElement("td");
  priceColumn.innerText = "$" + price;

    // Action column
    const actionColumn = document.createElement("td");

// Add buttons to the action column
const button1 = document.createElement("button");
button1.innerText = "Edit";
button1.addEventListener("click", function () {
  // Handle button 1 click event
  console.log("Button 1 clicked for " + productName);
});

const button2 = document.createElement("button");
button2.innerText = "Delete";
button2.addEventListener("click", function () {
  // Handle button 2 click event
  console.log("Button 2 clicked for " + productName);
});

actionColumn.appendChild(button1);
actionColumn.appendChild(button2);

cartItemRow.appendChild(productColumn);
cartItemRow.appendChild(quantityColumn);
cartItemRow.appendChild(priceColumn);
cartItemRow.appendChild(actionColumn);

  cartTable.appendChild(cartItemRow);

  // Append the table to the cart list in the sidebar
  const cartItemList = sidebarCart.querySelector("#cartItemList");
  cartItemList.innerHTML = ""; // Clear previous content
  cartItemList.appendChild(cartTable);
}


document.getElementById("refillForm").addEventListener("submit", function(event) {
  event.preventDefault();
  var quantity = parseFloat(document.getElementById("quantity").value);
  var price = parseFloat(document.getElementById("price").value);
  var productName = document.getElementById("modalProductName").innerText;
  var action = document.getElementById("modalProductName").innerText;

  console.log("Quantity: " + quantity + ", Price: " + price + ", Action: " + action);


  // Add the product details to the cart
  addToCart(quantity, price, productName,action);

  modal.style.display = "none";
});

</script>
