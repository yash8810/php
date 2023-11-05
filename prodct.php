<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed" . mysqli_connect_error();
} else {


    if (isset($_POST["add"])) {
        $pid = $_GET["id"];
        $pname = $_POST["hidden_name"];
        $pimage = $_POST["hidden_image"];
        $price = $_POST["hidden_price"];
        $qty = $_POST["qty"];
        $insrt = "INSERT into addtocartsecond (dis,image,price,qty) values ('$pname','$pimage','$price','$qty')";
        mysqli_query($conn, $insrt);
    }
}



?>


















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <style>
        .cart {
            margin: 50px;
        }
    </style>

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
                        <a href="facility.html" class="dropdown-item">Energy drink</a>
                        <a href="team.html" class="dropdown-item">Soft drink</a>
                        <a href="call-to-action.html" class="dropdown-item">chocolates</a>
                        <a href="appointment.html" class="dropdown-item">Snacks</a>
                        <a href="testimonial.html" class="dropdown-item">mysterybox</a>

                    </div>
                </div>
               
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="cart">
                <a href="cart.php"><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </div>

            <a href="login.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Log in<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <main>
        <ul class="mystyle-products">
            <li class="product">

                <center>
                    <h2>Energy drink</h2>
                </center>
                <div class="container">
                    <?php
                    $query = "SELECT * from addtocartone order by id asc";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                    <div class="card-deck">
                            <div class="card">
   
                            <div class="product">
                                <form action="energydrink.php?action=add&id=<?php echo $row["id"] ?>" method="post">
                            </div class="product">
                            <img src="img/<?php echo $row["image"]; ?>" class="attachment-shop_catalog" alt="">
                        </div>
                            <div class="card-body">
                            <h3>
                                <?php echo $row["dis"] ?>
                            </h3>
                            <p>RS
                                <?php echo $row["price"]; ?>
                            </p>
                            <label>quantity:</label>
                            <input type="number" id="qty" name="qty" value="1" min="1" max>
                            <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" class="attachment-shop_catalog">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["dis"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="submit" name="add" value="ADD TO CART">
                        </div>

                        </div>
                        </form>
                        </div>
                </div>
                        <?php
                        }
                        
                    }
                    ?>
                </div>
            </li>
        </ul>

    </main>





































    <!-- <ul class="mystyle-products">
        <li class="product">
           
               
                <img alt="" class="attachment-shop_catalog " src="primeblack.jpg">
                <h3>prime black edition</h3>
                <div class="qty">
                    <span class="amount">Rs.1000</span><br>
                    <label for="qty">Qty:</label> 
                    <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
                   </div>
                    <center><br>
                        <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
                    </center>
               
            </a>
            
           
        </li>
        <li class="product">
            
               
                <img alt="" class="attachment-shop_catalog " src="whiteprime.jpg">
                <h3>prime sugar free</h3>
                
                    <div class="qty">
                     <span class="amount">Rs.1000</span><br>
                     <label for="qty">Qty:</label> 
                     <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
                    </div>
                    <center><br>
                        <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
                    </center>
                
            </a>
            
           
        </li>
    </li>
    <li class="product">
        
           
            <img alt="" class="attachment-shop_catalog " src="redprime.jpg">
            <h3>prime watermelon</h3>
            <div class="qty">
                <span class="amount">Rs.500</span><br>
                <label for="qty">Qty:</label> 
                <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
               </div>
                <center><br>
                    <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
                </center>
            
        </a>
        
       
    </li>
</li>
<li class="product">
    
       
        <img alt="" class="attachment-shop_catalog " src="glowprime.jpg">
        <h3>prime glowberry</h3>
       
        <div class="qty">
            <span class="amount">Rs.1100</span><br>
            <label for="qty">Qty:</label> 
            <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
           </div>
          
            <center><br>
                <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </center>
        
    </a>
    
   
</li>
      
</li>
<li class="product">
    
       
        <img alt="" class="attachment-shop_catalog " src="icepop.avif">
        <h3>prime sugar free</h3>
        <div class="qty">
            <span class="amount">Rs.1500</span><br>
            <label for="qty">Qty:</label> 
            <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
           </div>
            <center><br>
                <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </center>
        
    </a>
    
   
</li>
<li class="product">
    
       
        <img alt="" class="attachment-shop_catalog " src="lemon prime.jpg">
        <h3>prime lemon lime</h3>
        <div class="qty">
            <span class="amount">Rs.250</span><br>
            <label for="qty">Qty:</label> 
            <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
           </div>
            <center><br>
                <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </center>
        
    </a>
    
   
</li>
<li class="product">
    
       
        <img alt="" class="attachment-shop_catalog " src="pinkprime.jpg">
        <h3>prime strawberry</h3>
        <div class="qty">
            <span class="amount">Rs.500</span><br>
            <label for="qty">Qty:</label> 
            <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
           </div>
            <center><br>
                <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </center>
        
    </a>
    
   
</li>
<li class="product">
    
       
        <img alt="" class="attachment-shop_catalog " src="comboprime.jpg">
        <h3>prime strawberry</h3>
        <div class="qty">
            <span class="amount">3500</span><br>
            <label for="qty">Qty:</label> 
            <input type="number" id="quantity" name="quantity" min="1" width="10px"><br>
        </div>
            <center><br>
                <a href=""><i class="fas fa-shopping-cart fa-lg" style="color: #fe5d37;"></i></a>
            </center>
       
    </a>
    
   
</li> 
    </ul>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div> -->
</body>

</html>