<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Water Refill</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
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
    .container {
      display: flex;
    }

    .column {
      flex: 1;
    }

    .image-container {
      text-align: center;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .button-container {
      display: flex;
      flex-direction: column; /* Added to stack the image and button vertically */
      align-items: center; /* Center items vertically */
      justify-content: center;
    }

    button {
      margin-top: 10px; /* Added to create space between the image and the button */
      padding: 10px 20px;
      font-size: 16px;
      background-color: #33abfa;
  color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .main {
  padding: 16px;
  margin-top: 15px;
  height: 1022px; 
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
  </style>
</head>
<body>
<div class="main">
        <ul>
          <li><a class="active" href="home.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="home.php#Contact">Contact</a></li>
          <li><a href="wc.php">Order Now!</a></li>
          <li><a href="">Cart!</a></li>
        </ul>
        <h1 class="header1" style="padding-top: 2%; margin-bottom: -3%;">Choose your preference.</h1><br><Br><br>
  <div class="container">
    <div class="column image-container">
      <img src="round1.png" alt="Water Image" width="500px" height="500px"><br>
      <a href='refill.php'><button>Refill Water Now!</button></a>

    </div>
    <div class="column button-container">
    <img src="round2.png" alt="Water Image" width="500px" height="500px">
      <button>Buy Water Gallon!</button>
    </div>
  </div>

</body>
</html>
