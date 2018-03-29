<!DOCTYPE html>
<html>
<head>
	  <title>Gold City Movies</title>
    <?php require_once("header.php"); ?>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./css/ticketOrder.css">
    <script type="text/javascript" src="./js/chantal.js"></script>
</head>
<body>

<?php $message = ""; ?>

<div id="wrapper">
  <div id="container">

    <div id="info">
      
      <img id="product" src="http://pngimg.com/uploads/superman/superman_PNG61.png"/>

      <p></p>
      <p></p>

      <div id="price">

        <h2></h2>

      </div>
    </div>

    <?php 
	  
	  if($_SESSION['logged_in'] == true){
	    ?>
	    <div>
	    
	      <?php 
	      if(isset($_POST['ticketSubmit'])){
	        $account_number = $_SESSION['account_number'];
	        $fname = "";
	        $lname = "";
	        $movie_title = "";
	        $ccard = "";
	        $num_seats = null;

	        $start_time = $_POST['start_time'];
	        $theatre_num = $_POST['theatre_num'];
	        $complex_name = $_POST['complex_name'];

	        $_SESSION['start_time'] = $start_time;
	        $_SESSION['theatre_num'] = $theatre_num;
	        $_SESSION['complex_name'] = $complex_name;


	        $mysqli = new mysqli("localhost","root","","332project");
	        $statement = "SELECT first_name, last_name, credit_card FROM customer WHERE account_number = ".$_SESSION['account_number'].";";
	        $stmt = $mysqli->prepare($statement);
	        $stmt->execute();
	        $stmt->bind_result($fname, $lname, $ccard);
	        $stmt->fetch();
	        $stmt->close();

	        $mysqli = new mysqli("localhost","root","","332project");

	        $statement = "SELECT movie_title, num_seats FROM showing WHERE start_time = '".$start_time."' and theatre_num = ".$theatre_num." and complex_name = '".$complex_name."';";
	        $stmt = $mysqli->prepare($statement);
	        $stmt->execute();
	        $stmt->bind_result($movie_title, $num_seats);
	        $stmt->fetch();
	        $stmt->close();
	        $_SESSION['movie_title'] = $movie_title;
	        $_SESSION['num_seats'] = $num_seats;
	        
	   

	         ?>

    <div id="payment">
	    <h4><?php echo $movie_title; ?></h4>
	    <p style="font-weight: bold;"><script type="text/javascript">document.write(getDate(<?php echo "'".$start_time."'"; ?>))</script>
	    <script type="text/javascript">document.write(getTime(<?php echo "'".$start_time."'"; ?>))</script> at <?php echo $complex_name ?></p>

      <form id="checkout" action="ticketOrderConfirm.php" method="post" onsubmit="">
 		<label for="name">Tickets</label>
        <input type="text" name="numTickets" id="numTickets" value="1" oninput="changeTotal(<?php echo $num_seats; ?>)"> x $8.50
        
        <label>Credit Card Number</label>
        <input id="cardNumber" type="text" name="name" required maxlength="16" value=<?php echo "'".$ccard."'"; ?> >

        <label>Card Holder</label>
       <input id="cardholder" type="text" name="name" required maxlength="50" value=<?php echo "'".$fname." ".$lname."'"; ?>>

        <label>Expiration Date</label>
        <div id="left">
            <select name="month" id="month" onchange="" size="1">
              <option value="00">MM</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            /
            <select name="year" id="year" onchange="" size="1">
              <option value="00">YY</option>
              <option value="01">16</option>
              <option value="02">17</option>
              <option value="03">18</option>
              <option value="04">19</option>
              <option value="05">20</option>
              <option value="06">21</option>
              <option value="07">22</option>
              <option value="08">23</option>
              <option value="09">24</option>
              <option value="10">25</option>
            </select>
        </div>

        <input type="hidden" name="movie_title" value="<?php echo $movie_title ?>">
 	    <input type="hidden" name="start_time" value="<?php echo $start_time ?>">
        <input type="hidden" name="theatre_num" value="<?php echo $theatre_num ?>">
         <input type="hidden" name="complex_name" value="<?php echo $complex_name ?>">
        <p id="totalSum">Total: $<span id="incSum">8.50</span></p>
        <input class="btn" id="purchaseButton" type="submit" name="purchase" value="Purchase">

        <p id="thankYou"><?php echo $message; ?></p>
      </form>
    </div>
    	
    

  </div>
</div>
	
	<?php 
	}else{
		echo "We're sorry, this page is unavailable!";
	}
	}else{
	   	echo "Please log in to continue.";
	   } ?>
</body>
</html>