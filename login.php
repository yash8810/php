<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
  echo "failed";
} else {
  echo "";
}
if (isset($_POST['signin'])) {

  $email= $_POST['email'];
  $pass = $_POST['pass'];
  $select = "select * from register where email='$email' and pass='$pass'";
  $result = mysqli_query($conn, $select);
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result);
    header('location:customerpanel.php');
  } else {
    $err[] = 'username and password does not exist';
  }
  if ($email == "admin@gmail.com" && $pass == "admin") {
    header('location:adminpanel.php');
    exit;
  } else {

  }


}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign in</title>


  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


  <link rel="stylesheet" href="style1.css">
</head>

<body>




  <section class="sign-in">
    <div class="container">
      <div class="signin-content">
        <div class="signin-image">
          <figure><img src="signup.gif" alt="sing up image"></figure>
          <a href="regiester.php" class="signup-image-link">Create an account</a>
        </div>

        <div class="signin-form">
          <h2 class="form-title">Sign in</h2>
          <?php
          if (isset($err)) {
            foreach ($err as $err) {
              echo '<span class="err-msg">' . $err . '</span>';
            }
            ;
          }
          ;


          ?>

          <form method="POST" class="register-form" id="login-form">
            <div class="form-group">
              <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
              <input type="email" name="email" id="email" placeholder="Enter Email" />
            </div>
            <div class="form-group">
              <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
              <input type="password" name="pass" id="your_pass" placeholder="Password" />
            </div>
            <a href="forgetpass1.php" class="signup-image-link">Forget password???</a><br>

            <div class="form-group form-button">
              <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>