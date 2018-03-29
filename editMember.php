<!DOCTYPE html>
<html>
<head>
    <?php include 'header-admin.php';?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/chantal.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/chantal.css">
  <link rel="stylesheet" type="text/css" href="./css/members.css">
</head>
<body>



<div class="container">
  
    <?php

      if(isset($_POST['submit-search']) && !isset($_POST['delete-submit'])){
        

        $account_number = $_POST['account'];

        $fnme = "";
        $lname = "";
        $street = "";
        $city = "";
        $pc = "";
        $phone_number = "";
        
        $mysqli = new mysqli("localhost","root","","332project");
        $statement = "SELECT first_name, last_name, street, city, pc, phone_number, email FROM customer WHERE account_number = ".$account_number.";";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($fname, $lname, $street, $city, $pc, $phone_number, $email);
        $stmt->fetch();
        

      ?>
        <span style="text-align: center;"><h3 >Customer Information</h3>
        <p>
        <span class="account-details">Account Number:</span> <?php echo $account_number;?><br>
        <span class="account-details">Name:</span> <?php echo $fname." ".$lname; ?><br>
        <span class="account-details">Email:</span> <?php echo $email;?><br>
        <span class="account-details">Address:</span> <?php echo $street.", ".$city." ".$pc;?><br>
        <span class="account-details">Phone Number:</span> <?php echo $phone_number;?> <br>
         </p>

              <form action="editMember.php" method="post" onsubmit="return confirmDelete()">
                <input type="hidden" name="account" value="<?php echo $account_number ?>">
                <input type="submit" id="red-submit" class="btn btn-warning" name="submit" value="DELETE">
              </form>
            </div>

          <?php 
          $stmt->close();
        


        
      
    ?><div class="container">
      <span style="text-align:center;" ><h3 >Viewing History</h3>

      <?php 

        $movie_title = "";
        $start_time = "";
        $theatre_num = null;
        $complex_name = "";
        $tickets_reserved = null;
        $statement = "SELECT movie_title, start_time, theatre_num, complex_name, tickets_reserved FROM going_to WHERE customer_account = ".$account_number.";";
        $stmt = $mysqli->prepare($statement);
        $stmt->execute();
        $stmt->bind_result($movie_title, $start_time, $theatre_num, $complex_name, $tickets_reserved);
        while($stmt->fetch()){ ?>

          <div class="box3">
            <div class="box3-title"><h4><?php echo $movie_title; ?></h4></div>
            <div class="box3-tickets"><?php echo $tickets_reserved." tickets reserved at ".$complex_name; ?></div>
            <div class="box3-when"><script type="text/javascript">document.write(getTime(<?php echo "'".$start_time."'"; ?>) + " " +getDate(<?php echo "'".$start_time."'"; ?>))</script></div>

          </div>

       <?php  } 
        $stmt->close();

       }else{ 
          //delete from going_to and rates then delete from customer
          $mysqli = new mysqli("localhost","root","","332project");

          $statement1 = "DELETE FROM `going_to` WHERE `customer_account` = '".$_POST['account']."';";
          $stmt1 = $mysqli->prepare($statement1);
          $stmt1->execute();
          $stmt1->close();

          $statement2 = "DELETE FROM rates WHERE `customer_account` = '".$_POST['account']."';";
          $stmt2 = $mysqli->prepare($statement2);
          $stmt2->execute();
          $stmt2->close();

          $statement3 = "DELETE FROM customer WHERE `account_number` = '".$_POST['account']."';";
          $stmt3 = $mysqli->prepare($statement3);
          $stmt3->execute();
          $stmt3->close();

        ?>

        <span style="text-align: center;"> 
          <h3><?php echo "Member Does Not Exist!"; ?></h3>
          <a href="members.php" style="margin-left: 44%"><button type="button" class="btn btn-default">All Members</button></a>
        </span>


      <?php } ?>

  </span>
  </div>
  </div>
  </span>

</div>



</body>
</html>
