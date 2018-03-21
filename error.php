<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body style="background: rgb(90,90,90) url('http://www.tokkoro.com/picsup/1304228-black-panther.jpg')">
<div class="form">
    <h1>Error</h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
    else:
        header( "location: login.php" );
    endif;
    ?>
    </p>
    <a href="login.php"><button class="button button-block blue"/>Back to login</button></a>
</div>
</body>
</html>
