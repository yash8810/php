<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action='#' method='POST'>
<input type='number' name='otp'>
    <input type='submit' name='submit'>
  <?php 
    if(isset($_POST["submit"]))
    {
        echo $otp;
        if($_POST["otp"]==$_SESSION["otp"])
        {
            $url=$_SESSION["url"];
            echo "<script>window.location='".$url."'</script>";
        }
        else
        {
            echo "GG";
        }
    }

  ?>
</form>
</body>
</html>