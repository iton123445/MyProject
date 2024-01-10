<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/smiling-water-drop-11549857218bovtski57z-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Aqua Delivery Iligan City</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
  .homebutton {
  border-radius: 4px;
 
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  position: fixed;
  top: 20px;
  left: 20px;
  background-image: linear-gradient(
      rgba(255, 255, 255, 0),
      rgba(255, 255, 255, 0)
    ),
    linear-gradient(101deg, #7676f2, #00d4ff);
}

.homebutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.homebutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.homebutton:hover span {
  padding-right: 25px;
}

.homebutton:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<body>
<a href="../index.php" class="homebutton"><span>Home </span></a><br>

<section>
  
  <div class="main-form-container">
 
    <div id="form_section" class="form-container">
                <div class="login-form form-wraper">
                    <div>
                        <div class="form-title">
                            <h2>Sign In</h2>
                        </div>
                        <form action="login_process.php" method="post">
                            <div class="input-group">
                                <div class="box">
                                    <span>
                                        <input name="username" placeholder="Username" class="myInput" type="text"  />
                                    </span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="box">
                                    <span>
                                        <input name="password" placeholder="Password" class="myInput" type="password"  />
                                    </span>
                                </div>
                            </div>
                            <div class="forget-password">
                                <a href="">FORGOT PASSWORD</a>
                            </div>

          <div class="action-button">
            <button>Sign In</button>
          </div>
</form>
        </div>
      </div>
      <div class="signUp-form form-wraper">
        <div>
          <div class="form-title">
            <h2>Sign Up</h2>
          </div>
          <form action="register_process.php" method="post">
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Full Name" class="myInput" type="text" name="fullname"/>
              </span>
            </div>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Username" class="myInput" type="text" name="username" />
              </span>
            </div>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Mobile No." class="myInput" type="number" name="mobilenum"/>
              </span>
            </div>
          </div>
          <div style="margin-bottom: 0px;" class="input-group">
            <div class="box">
              <span>
                <input placeholder="Password" class="myInput" type="password" name="password" />
              </span>
            </div>
          </div>
          <div class="action-button">
            <button>Sign Up</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div id="multiple-btn" class="bg-btn-container">
      <div class="action-button">
        <button>Sign In</button>
      </div>
      <div class="action-button">
        <button>Sign Up</button>
      </div>
    </div>

  </div>
</section>

</body>
</html>

<script type="text/javascript">
    const inputs = document.querySelectorAll("input");
inputs.forEach(function (input) {
  input.addEventListener("focus", function () {
    const parentElement = input.parentElement.parentElement;
    parentElement.classList.add("box-animation");
  });
  input.addEventListener("blur", function () {
    const parentElement = input.parentElement.parentElement;
    parentElement.classList.remove("box-animation");
  });
});

const buttons = document.querySelectorAll("#multiple-btn button");
const form_container = document.getElementById('form_section')
buttons.forEach((button) => {
button.addEventListener("click", () => {
form_container.classList.toggle("left-right");

});
});
</script>