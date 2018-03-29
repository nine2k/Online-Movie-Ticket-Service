<!DOCTYPE html>
<html>
<head>
    <?php include 'header-admin.php';?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/chantal.css">
  <link rel="stylesheet" type="text/css" href="./css/members.css">
  <title>Members</title>
</head>
<body>



<div class="container">
  <span style="text-align: center;"><h3 >Search For A Member</h3></span>
  <form action="" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Member name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Member last name..">

    <label for="lname">Account Number</label>
    <input type="text" id="account" name="account" placeholder="Member account number..">
  
    <input type="submit" name="submit-search" value="Search">
  </form>

  <div class="container">
    <?php

      if(isset($_POST['submit-search'])){

        $mysqli = new mysqli("localhost","root","","332project");
        $statement = "";
        $account_number = "";
        $firstname = "";
        $lastname = "";
        $email = "";



        if(!empty($_POST['account'])){
            $statement = "SELECT first_name, last_name, email FROM customer WHERE account_number ='".$_POST['account']."';";
            $stmt = $mysqli->prepare($statement);
            $stmt->bind_result($firstname, $lastname, $email);
            $stmt->execute();
            $stmt->fetch();
           ?>
           <div class="box">

            <span class="box-details name"><?php echo $firstname; ?></span>
            <span class="box-details name"><?php echo $lastname; ?></span>
            <span class="box-details email"><?php echo $email; ?></span>
            <span class="box-details account"><?php echo $_POST['account']; ?></span>

            <form action="editMember.php" method="post">
              <input type="hidden" name="account" value="<?php echo $_POST['account'] ?>">
              <input type="submit" class="btn btn-default small" name="submit-search" value="View Member">
            </form>

          </div>
            <?php
        }else if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){
      
          $statement = "SELECT account_number, email FROM customer WHERE first_name = '".$_POST['firstname']."' AND last_name = '".$_POST['lastname']."';";
          $stmt = $mysqli->prepare($statement);
          $stmt->bind_result($account_number, $email);
          $stmt->execute();
          while($stmt->fetch()){ ?>
            <div class="box">

            <span class="box-details name"><?php echo $_POST['firstname']; ?></span>
            <span class="box-details name"><?php echo $_POST['lastname']; ?></span>
            <span class="box-details email"><?php echo $email; ?></span>
            <span class="box-details account"><?php echo $account_number; ?></span>

            <form action="editMember.php" method="post">
              <input type="hidden" name="account" value="<?php echo $account_number ?>">
              <input type="submit" class="btn btn-default small" name="submit-search" value="View Member">
            </form>

          </div>
            <?php
          }}else{

            $statement = "SELECT first_name, last_name, account_number, email FROM customer;";
            $stmt = $mysqli->prepare($statement);
            $stmt->bind_result($firstname, $lastname, $account_number, $email);
            $stmt->execute();
            while($stmt->fetch()){ ?>
              <div class="box">

              <span class="box-details name"><?php echo $firstname; ?></span>
              <span class="box-details name"><?php echo $lastname; ?></span>
              <span class="box-details email"><?php echo $email; ?></span>
              <span class="box-details account"><?php echo $account_number; ?></span>

              <form action="editMember.php" method="post">
                <input type="hidden" name="account" value="<?php echo $account_number ?>">
                <input type="submit" class="btn btn-default small" name="submit-search" value="View Member">
              </form>
            </div>
          <?php }
          $stmt->close();
        


        
      }}
    ?>
  </div>


</div>



</body>
</html>
