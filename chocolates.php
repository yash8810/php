<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "munchbagshoppingcart");
if (mysqli_connect_errno()) {
    echo "failed" . mysqli_connect_error();
} else {
    if (isset($_POST["submit"])) {
        $pid = $_GET["id"];
        $pname=$_POST["hidden_name"];
        $pdis = $_POST["hidden_dis"];
        $pimage = $_POST["hidden_image"];
        $pprice = $_POST["hidden_price"];
        $pqty = $_POST["qty"];
        $insrt = "INSERT into addtocart(pname,dis,img,price,qty) values ('$pname','$pdis','$pimage','$pprice','$pqty')";
        mysqli_query($conn, $insrt);
        // $sel="SELECT * from product where cid=1";
        // $result = mysqli_query($conn, $sel);

    }







}









?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dhruv.css">
    <title>CART</title>
    <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- <NAV>
        <span>SHOP HERE</span>
        <div>
            <a href="">login</a>
            
            <div>
    </NAV> -->
    
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="" class="navbar-brand">
                <h1 class="m-0 text-primary"><img src="Munchbag logo.jpg" width="100px">Munchbags.in</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="customerpanel.php" class="nav-item nav-link active">Home</a>
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">CHOCOLATES</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="energydrink.php" class="dropdown-item">Energy drink</a>
                            <a href="softdrink.php" class="dropdown-item">Soft drink</a>
                            <a href="chocolates.php" class="dropdown-item">chocolates</a>
                            <a href="snackes.php" class="dropdown-item">Snacks</a>
                            <!-- <a href="testimonial.html" class="dropdown-item">mysterybox</a> -->
                           
                        </div>
                    </div>
                   
                    <a href="contactus.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <a href="munchbag-in.html" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log out<i class="fa fa-arrow-right ms-3"></i></a>
                <a href="cart.php"><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
                
            </div>
        </nav>
    <main>
        <h2  class="m-0 text-primary">CHOCOLATES</h2>
        <div class="container">
            <?php
            $query = "SELECT * from product where cid=3";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="product">
                        <form action="chocolates.php?action=add&id=<?php echo $row["pid"] ?>" method="post">
                            <div class="product">
                                <img src="addproductimg/<?php echo $row["img"]; ?>" alt="" width="280px">
                                <h3>
                                    <?php echo $row["pname"] ?>
                                </h3>
                                <h6>
                                    <?php echo $row["dis"] ?>
                                </h6>
                                <p>RS
                                    <?php echo $row["price"]; ?>
                                </p>
                                <input type="number" id="qty" name="qty" value="1" min="1" max="10">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">

                                <input type="hidden" name="hidden_image" value="<?php echo $row["img"]; ?>">
                                <input type="hidden" name="hidden_dis" value="<?php echo $row["dis"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
                                <button name="submit" class="btn btn-outline-danger">ADD TO CART</i></button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>


        </div>





    </main>
   
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>