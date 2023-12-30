<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Iton's Website</title>
</head>
<style>* {
  box-sizing: border-box;
}

html {
  font: 110%/1.5 monospace
}

body {
  margin: 2rem;
  max-width: 700px;
  margin: auto;
}

.column {
  float: left;
  width: 50%;
  padding: 1rem;
  height: 300px;
  border: 1px solid black;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media (max-width: 600px) {
  .column {
    width: 100%;
    
  }
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
</style>
<body>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="#Contact">Contact</a></li>
  <li><a href="wc.php">Order Now!</a></li>
  <li><a href="">Cart!</a></li>
</ul>
<br><br><br><br>
<h2 align="center">Pick Your Gallon Size</h2>

  <div class="row">
    <div class="column" style="background-color:#eee;" align="center">
      <h2>Bottle 500ML</h2>
      <p><img src="b500ml.png" alt="bottle" height='150px' ></p>
      <p>Refill me now!</p>
    </div>
    <div class="column" style="background-color:#eee;" align="center">
    <h2>Bottle 1L</h2>
      <p><img src="b1l.png" alt="bottle" height='150px' ></p>
      <p>Refill me now!</p>
    </div>
  </div>
  
  <div class="row">
    <div class="column" style="background-color:#eee;">
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#eee;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div>

  <div class="row">
    <div class="column" style="background-color:#eee;">
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#eee;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div>

  <div class="row">
    <div class="column" style="background-color:#eee;">
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#eee;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div>
</body>
</html>