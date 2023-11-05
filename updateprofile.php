<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed";
} else {
    echo "";
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
   

    $select = "select * from register where uname='$uame' and email='$uname'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $err[] = 'username or email already exist';
    }  
    else {
            $update = "update register set uname='$uname',email='$email' where name='$name'";
            mysqli_query($conn, $update);
            header('location:customerpanel.php');
            exit;


        }
    

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <img src="Munchbag logo.jpg" width="10px"> -->
    <title>Update Profilr</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


    <link rel="stylesheet" href="style1.css">

</head>

<body>

    <div class="main">


        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">update profile </h2>
                        <?php
                        if (isset($err)) {
                            foreach ($err as $err) {
                                echo '<span class="err-msg">' . $err . '</span>';
                            }
                            ;
                        }
                        ;


                        ?>




                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="enter Your  Name" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uname" id="uname" placeholder="enter Your User Name to update" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="enter Your Email to update" />
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="update" class="form-submit" value="update" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/update1.jpg" alt="sing up image"></figure>
                       
                    </div>

                </div>
            </div>
        </section>



    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>