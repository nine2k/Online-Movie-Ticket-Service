<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gold City Movies</title>
    <meta name="keywords" content="movie,theatre,login" />
    <meta name="description" content="Login to purchase tickets" />
    <link rel="icon" href="">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-1.11.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" rev="stylesheet" type="text/css" media="all" href="./css/login.css">
		<link rel="stylesheet" rev="stylesheet" type="text/css" href="./css/home.css">
    <script src="./js/jquery.validate.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<div class="side">
			<div class="bg"></div>
			<div>
				<h3>Gold City Movies</h3>
			</div>
			<input type="text" class="search" placeholder="Search" />
			<ul class="menu">
				<li title="" class="selected"><i class="zmdi zmdi-label-alt"></i> Today</li>
				<li title="Ladies Night"><i class="zmdi zmdi-female"></i> Thrusday</li>
				<li title="Family Friday"><i class="zmdi zmdi-male-female"></i> Friday</li>
				<li title=""><i class="zmdi zmdi-collection-item-1"></i> Saturday</li>
				<li title=""><i class="zmdi zmdi-collection-item-2"></i> Sunday</li>
				<li title="Monday for All"><i class="zmdi zmdi-accounts-alt"></i> Monday</li>
				<li title="Kids Tuesday"><i class="zmdi zmdi-face"></i> Tuesday</li>
				<li class="divider">
					<i class="zmdi zmdi-calendar"></i> Coming Soon
				</li>
			</ul>
		</div>
		<div class="main-wrap">
			<div class="main">
				<div class="list">
					<div class="scroll">
						<button class="scrollTop"><i class="zmdi zmdi-arrow-left"></i></button>
						<button class="scrollDown"><i class="zmdi zmdi-arrow-right"></i></button>
					</div>
					<header>
						<ul class="filter">
							<li data-gid="," class="selected">All</li>
							<li data-gid="28">Action</li>
							<li data-gid="12">Adventures</li>
							<li data-gid="35">Comedy</li>
							<li data-gid="18">Drama</li>
						</ul>
					</header>
					<div class="content">
						<ul class="covers"></ul>
					</div>
				</div>
				<div class="checkout">
					<div class="sinopsis">
						<button class="back">
							<i class="zmdi zmdi-arrow-left"></i>
						</button>
						<img class="cover" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8zw8AAhMBENYXhyAAAAAASUVORK5CYII=" style="background-image: url(https://image.tmdb.org/t/p/w300//gfJGlDaHuWimErCr5Ql0I8x9QSy.jpg)">
						<h3>Wonder Woman</h3>
						<p>An Amazon princess comes to the world of Man to become the greatest of the female superheroes.</p>
						<span>Wed, 28 Jun </span>
						<small>16:00 (2h 15m)</small>
					</div>
					<section>
						<ul class="legend">
							<li>available</li>
							<li>taken</li>
						</ul>
						<span>Select your seats</span>
						<div class="seats"></div>
						<div class="screen">screen</div>
					</section>
					<div class="total">
						<small>Total </small><span>$0</span>
						<button>CHECKOUT</button>
						<div class="loader"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
