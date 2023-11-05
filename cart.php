<?php
session_start();
$conn = mysqli_connect('localhost', 'root','', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed" . mysqli_connect_error();
} else {
    if (isset($_GET["action"]) && ($_GET["action"]) == "delete") {
        $pname = $_GET["name"];
        
    
        $db = "delete from addtocart where dis='$pname'";
        mysqli_query($conn, $db);
    }
    // if (isset($_POST["submit"])) {
    //     $pid = $_GET["id"];
    //     $pname=$_POST["hidden_name"];
    //     $pdis = $_POST["hidden_dis"];
    //     $pimage = $_POST["hidden_image"];
    //     $pprice = $_POST["hidden_price"];
    //     $pqty = $_POST["qty"];
    //     $total= $pqty * $pprice;
    //     echo $pprice."".$pn
    //     $insrt = "INSERT into addtocart(pname,dis,img,price,qty,total) values ('$pname','$pdis','$pimage','$pprice','$pqty','$total')";
    //     mysqli_query($conn, $insrt);
        // $sel="SELECT * from product where cid=1";
        // $result = mysqli_query($conn, $sel);

    }
    // if(isset($_POST['add']))
    // {
    //     $total=$_POST['total'];
    //     $update="insert into details(total) values total='$total' ";
    //     mysqli_query($conn, $update);
    // }








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="logo.jpg" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap"
        rel="stylesheet">

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
    <link href="product.css" rel="stylesheet">
</head>

<body>



    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="" class="navbar-brand">
            <h1 class="m-0 text-primary"><img src="Munchbag logo.jpg" width="100px">Munchbags.in</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="index.html" class="nav-item nav-link active">Home</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Shop by category</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                        <a href="energydrink.php" class="dropdown-item">Energy drink</a>
                        <a href="softdrink.php" class="dropdown-item">Soft drink</a>
                        <a href="chocolates.php" class="dropdown-item">chocolates</a>
                        <a href="snackes.php" class="dropdown-item">Snacks</a>
                        <!-- <a href="" class="dropdown-item">mysterybox</a> -->

                    </div>
                </div>
                
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="cart">
                <a href="energydrink.php"><i class="fa fa-shopping-bag" aria-hidden="true"
                        style="color: #fe5d37"></i></a>
            </div>

          
        </div>
    </nav>
    
    <!-- <div class="table_container"> -->
    <form action=""method="post">
    <!-- <div class="container"> -->
         <!-- <div class="row mt-5"> -->
             <div class="col">
                 <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">product Cart</h2>
                    </div>  
                    <div class="card-body">
                         <table id="example" class="display" style="width:100%">
        <thead> 
            
                <th>PRODUCT IMAGE</th>
                <th>PRODUCT NAME</th>
                <th>PRODUCT DISCRIPTION</th>
                <th>PRODUCT PRICE</th>
                <th>QTY</th>
                <th>TOTAL</th>
                    <th>REMOVE ITEM</th>
                </button>
        </thead>    
            <?php
            $qry = "SELECT * from addtocart order by id asc";
            $result = mysqli_query($conn, $qry);
            $total = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><img src="addproductimg/<?php echo $row["img"]; ?>" alt="" width="150px"></td>
                        <td>
                        <?php echo $row["pname"]; ?>
                        </td>

                        <td>
                            <?php echo $row["dis"]; ?>
                        </td>
                        <td>
                            <?php echo $row["price"]; ?>
                        </td>
                        <td>
                            <?php echo $row["qty"]; ?>
                        </td>
                        <td>
                            <?php echo number_format($row["qty"] * $row["price"], 2); ?>
                        </td>
                        <td><a href="cart.php?action=delete&name=<?php echo $row["dis"]; ?>"><span>REMOVE ITEM</span></td>
                        <?PHP
                        
                        $total = $total + ($row["qty"] * $row["price"]);

                      

                }
            }
            ?>
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>total</td>
                <td>
                    /<?php echo number_format($total, 2); ?>
                </td>
                
            </tr>
        </table>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

<button id="rzp-button1"class="btn btn-outline-dark btn-lg" name="add"><i class="fas fa-money-bill"></i><a href="pay/index.php">
                        Go To Payment </a></button>

</html>


<script>
// Calculate the total amount
var totalAmount = <?php echo $total; ?>;

var options = {
    "key": "rzp_test_lSprp9yxA7tPlz",
    "amount": totalAmount * 100, // Convert the amount to paise (100 paise = 1 INR)
    "currency": "INR",
    "name": "JAY BHAVANI LOCHO",
    "description": "LOCHO Payment",
    "image": "https://www.google.com/imgres?imgurl=https%3A%2F%2Fis3-ssl.mzstatic.com%2Fimage%2Fthumb%2FPurple122%2Fv4%2F24%2F71%2F3b%2F24713b5d-278c-90d9-6b6d-42ed637ded35%2FAppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png%2F512x512bb.jpg&tbnid=6xILsIBiznCvsM&vet=12ahUKEwjnwIDrwqyCAxX-SGwGHQ-pA98QMygDegQIARBV..i&imgrefurl=https%3A%2F%2Fappadvice.com%2Fapp%2Fmunchbag%2F1535223802&docid=igh_U22MVuPPNM&w=512&h=512&itg=1&q=munchbag%20logo&ved=2ahUKEwjnwIDrwqyCAxX-SGwGHQ-pA98QMygDegQIARBV",
    "prefill": {
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000" // Make sure to include the plus sign
    },
    "handler": function(response) {
        // Payment successful, you can display a success message here
        alert('Payment successful');
        
        // Redirect to the home page (index.php)
        window.location.href = 'pay/index.php';
    }
};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
}
</script>