<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header-admin.php';?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/chantal.css">
	<link rel="stylesheet" type="text/css" href="./css/members.css">
	<title>Add Movie</title>

</head>

<body>

<div class="container">
  <span style="text-align: center;"><h3 >Add a Movie</h3></span>
  <form action="add_movies_process.php" method="post">
    <label >Title</label>
    <input type="text" name="title" placeholder="title">

    <label >Run Time</label>
    <input type="text" name="run_time" placeholder="run time">

    <label>PG Rating</label>
    <input type="text" name="pg_rating" placeholder="pg rating">

    <label >Plot Synopsis</label>
    <textarea  class="large-text" name="plot_synopsis" placeholder="plot"></textarea> 

    <label>Production Company</label>
    <input type="text" name="production_company" placeholder="production company">

    <label>Supplier</label>
    <input type="text"  name="supplier" placeholder="supplier">

    <label>Start Date</label>
    <input type="text" name="start_date" placeholder="YYYY-MM-DD">

    <label>End Date</label>
    <input type="text" name="end_date" placeholder="YYYY-MM-DD">

    <label>Director First Name</label>
    <input type="text"  name="director_fname" placeholder="first name">

    <label>Director Last Name</label>
    <input type="text"  name="director_lname" placeholder="last name">

    <label>Cover Image</label>
    <input type="text"  name="Cover_img" placeholder="link">
  
    <input type="submit" value="Add">
  </form>

</div>

 
</body>
</html>






  