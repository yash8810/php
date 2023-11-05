<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed" . mysqli_connect_error();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customerdetail</title>
    <link rel="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> -->
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





    <!-- <div class="table_container"> -->
    <form action="adminpanel.php" method="post">
        <section class="panel important">
            <!-- <div class="container"> -->
            <!-- <div class="row mt-5"> -->
            <div class="container">
                <div class="row mt-5">
                    <div class="col">
                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="col">
                                    <div class="card mt-5">
                                        <div class="card-header">
                                            <h2 class="display-6 text-center">CUSTOMER DETAILS</h2>
                                        </div>
                                        <div class="card-body">
                                            <table id="example" class="display" style="width:100%">
                                                <thead>

                                                    <th>CUSTOMER ID</th>
                                                    <th>CUSTOMER NAME</th>
                                                    <th>USERNAME</th>
                                                    <th>PASSWORD</th>
                                                    <th>EMAIL</th>
                                                    </button>
                                                </thead>
                                                <?php
                                                $qry = "SELECT * from register order by id asc";
                                                $result = mysqli_query($conn, $qry);
                                                // $total = 0;
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["name"]; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row["uname"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["pass"]; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row["email"]; ?>
                                                            </td>



                                                            <?PHP
                                                    }
                                                }
                                                ?>
                                                </tr>

                                            </table>

                                        </div>
    </form>
    <script>
        $("#example").dataTable();
    </script>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

</body>














</html>