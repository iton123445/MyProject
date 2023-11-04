<!DOCTYPE html>
<html>
<head>
<title>Water Refilling System</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
   
<section>
  <div class="main-form-container">

    <div id="form_section" class="form-container">
      <div class="login-form form-wraper ">
        <div>
          <div class="form-title">
            <h2>Login</h2>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Username" class="myInput" type="text" />
              </span>
            </div>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Password" class="myInput" type="text" />
              </span>
            </div>
          </div>
          <div class="forget-password">
            <a href="">FORGOT PASSWORD</a>
          </div>
          <div class="action-button">
            <button>Login</button>
          </div>
        </div>
      </div>
      <div class="signUp-form form-wraper">
        <div>
          <div class="form-title">
            <h2>Sign Up</h2>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Full Name" class="myInput" type="text" />
              </span>
            </div>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Username" class="myInput" type="text" />
              </span>
            </div>
          </div>
          <div class="input-group">
            <div class="box">
              <span>
                <input placeholder="Mobile No." class="myInput" type="number" />
              </span>
            </div>
          </div>
          <div style="margin-bottom: 0px;" class="input-group">
            <div class="box">
              <span>
                <input placeholder="Password" class="myInput" type="password" />
              </span>
            </div>
          </div>
          <div class="action-button">
            <button>Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <div id="multiple-btn" class="bg-btn-container">
      <div class="action-button">
        <button>Login</button>
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