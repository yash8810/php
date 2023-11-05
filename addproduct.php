<?php
session_start();
$conn=mysqli_connect("localhost","root","","munchbagshoppingcart");
if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_error();
}
else{
    echo "";
}
if(isset($_POST["submit"])){

    $name=$_POST['pname'];
    $dis=$_POST['dis'];
    $filename=$_FILES['img']['name'];
    $tmpfile=$_FILES['img']['tmp_name'];
    $folder="addproductimg/".$filename;
    $price=$_POST['price'];
    $category=$_POST['cid'];


    if($filename==""){
        echo "file is not uploaded";
    }
    else
    {
        $insrt="INSERT into product (pname,dis,img,price,cid) values ('$name','$dis','$filename','$price','$category')";
        move_uploaded_file($tmpfile,$folder);
        $result=mysqli_query($conn,$insrt);
        echo "added successfully";
    }
    
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('img/logo.png');
            background-repeat: no-repeat;
            background-color: transparent;
            background-size: auto;
            margin-top: 100px;
            background-position: center;
            font-weight: bold;
            font-size: 20px;
        }
        label{
            color: #fe5d37;
        }
        button{

            background-color: #fe5d37;
            color: white;
            border: #fe5d37;
        }
    </style>
</head>

<body>
    <center>
    <form enctype="multipart/form-data" method="post">
        <label for="name">NAME:</label>
        <input type="text" placeholder="enter product name" name="pname"><br><br>


        <label for="discription">DISCRIPTION:</label>
        <input type="text" placeholder="enter product discription" name="dis"><br><br>


        <label for="image">IMAGE:</label>
        <input type="file" name="img"><br><br>

        <label for="price">PRICE:</label>
        <input type="text" name="price" placeholder="enter price"><br><br>

        

        <div>
            <label for="cat">CATEGORY</label>
            <select id="cid" name="cid"><br>
                <?php
                $sql = "select * from tblcategory";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["cid"] . '">' . $row["cname"] . '</option>';
                    }
                }
                ?>
            </select><br>
        </div>
        <br>
        <button type="submit" name="submit">submit</button>




    </form>
    </center>
</body>

</html>