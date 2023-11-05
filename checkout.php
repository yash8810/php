<?php
session_start();
error_reporting(E_ALL);
include('config.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    // TOTAL
    $sql = "SELECT SUM(products.price) as total FROM cart INNER JOIN products ON products.id = cart.productid WHERE cart.user=:user";
    $query = $db->prepare($sql);
    $query->bindParam(':user', $user, PDO::PARAM_STR);
    $query->execute();
    $total = $query->fetch(PDO::FETCH_OBJ);

    // FECTH PRODUCTS
    $sql = "SELECT cart.id,products.title,products.price,products.img FROM cart INNER JOIN products ON products.id = cart.productid WHERE cart.user=:user";
    $query = $db->prepare($sql);
    $query->bindParam(':user', $user, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);


    //INSERT ORDER
    if (isset($_POST['orderplace'])) {
        $address = $_POST['address'];
        $sql = "INSERT INTO orders(user, address) VALUES(:user,:address)";
        $query = $db->prepare($sql);
        $query->bindParam(':user', $user, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $db->lastInsertId();
        if ($lastInsertId) {

            foreach ($results as $item) {
                $sqlitem = "INSERT INTO orderitems (oid,ptitle,price) VALUES (:orderid,:title,:price)";
                $stmtitem = $db->prepare($sqlitem);
                $stmtitem->bindParam("orderid", $lastInsertId, PDO::PARAM_STR);
                $stmtitem->bindParam("title", $item->title, PDO::PARAM_STR);
                $stmtitem->bindParam("price", $item->price, PDO::PARAM_INT);
                $stmtitem->execute();
            }

            //CLEAR CART
            $sql = "DELETE FROM cart WHERE user = (:user)";
            $query = $db->prepare($sql);
            $query->bindParam(':user', $user, PDO::PARAM_STR);
            $query->execute();
            
            echo "<script>alert('Order Placed')</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        } else {
            echo "<script>alert('Please Fill All Valid Details')</script>";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrendZ | Online Store for Latest Trends</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script>
    if (typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
    </script>
</head>

<body>
    <section>
        <?php include('./inc/header.php'); ?>

        <?php if (strlen(isset($_SESSION['login']) == 0)) { ?>
        <div class="container mt-5 p-5">
            <h3 class="p-5 m-5 text-center">Please Login To Check Cart</h3>
        </div>
        <?php } else { ?>
        <div class="container mt-5 p-5">
            <div class="clearfix">
                <h3 class="py-4 float-left">My Cart</h3>
                <h3 class="py-4 float-right" id="pay-btn" >Total : <?php echo CURRENCY; ?> <?php echo $total->total; ?></h3>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-8">
                    <form class="text-center border border-light p-5" method="post">
                        <p class="h4 mb-4">Delivery Details</p>
                        <input name="address" type="text" class="form-control mb-4"
                            placeholder="Please Enter Complete Address" required>
                        <!-- <input class="btn btn-primary" type="submit" value="Place Order" name="orderplace"> -->
                        <button id="rzp-button1" class="btn btn-outline-dark btn-lg"><i class="fas fa-money-bill"></i>
                        Go To Payment </button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php include('./inc/footer.php'); ?>
    </section>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>


<script>
var totalAmountText = $('#pay-btn').text(); // Get the text content of #pay-btn
var totalAmount = parseInt(totalAmountText.replace(/[^\d.]/g, ''), 10); // Extract and parse the numeric part
var amt = totalAmount; // Store the total amount in the amt variable

var options = {
    "key": "rzp_test_Mh332dFAGXtlgm",
    "amount": amt * 100,
    "currency": "INR",
     "name": "JAY BHAVANI LOCHO ",
    "description": "LOCHO Payment",
    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
    "prefill": {
        "email": "gaurav.kumar@example.com",
        "contact": +919900000000,
    },
    "handler": function(response) {
    // Payment successful, you can display a success message here
    alert('Payment successful');
    
    // Redirect to the home page (index.php)
    window.location.href = 'index.php';
}

};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
}
</script>
