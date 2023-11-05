<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed";
} else {
    echo "";
}
$nameErr = $emailErr ="";
$name = $email= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is Required";
    } else {
        $name = input_data($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/", $name)) {
            $nameErr = "Only Alphabets and white space are allowed.";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
}
function input_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $cpass = $_POST['cpass'];

    $select = "select * from register where email='$email' or uname='$uname'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $err[] = 'username and email already exist';
    } else {
        if ($pass != $cpass) {
            $err[] = 'password does not matches';
        } else {
            $insert = "insert into register (name,uname,pass,email) values ('$name','$uname','$pass','$email')";
            mysqli_query($conn, $insert);
            header('location:login.php');


        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="munchbag logo.jpg"/>
    <title>Sign Up</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


    <link rel="stylesheet" href="style1.css">

</head>

<body>

    <div class="main">


        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">regiester... </h2>
                        <?php
                        if (isset($err)) {
                            foreach ($err as $err) {
                                echo '<span class="err-msg">' . $err . '</span>';
                            }
                            ;
                        }
                        ;


                        ?>
                         <span class="err">* required field </span>

                        <form method="POST" class="register-form" id="register-form"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your  Name" required/>
                                <span class="err">* <?php echo $nameErr; ?> </span>

                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uname" id="uname" placeholder="Your User Name" />
                                
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                                <span class="err">* <?php echo $emailErr; ?> </span>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpass" id="cpass" placeholder="Repeat your password" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="orange.gif" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">already a member</a>
                    </div>

                </div>
            </div>
        </section>



    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>