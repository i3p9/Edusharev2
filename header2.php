<?php
session_start();
include "includes/config.php";
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
    $homepage="welcomes.php";
    $idval=$_SESSION["username"];
    $idlink="profile.php";
} else {
	$homepage="index.php";
	$idval="Sign in";
    $idlink="signupandlogin.php";
} 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>EduShareHeader</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		<!-- Header -->
		<header id="header" class="delta" style="background-color: black; padding: 5px;" >
			<div class="container">
				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="<?php echo $homepage; ?>">
							<img src="img/edusharelogo.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="<?php echo $homepage; ?>">Home</a></li>
						<li><a href="browsev2.php">Courses</a></li>
						<li><a href="<?php echo $idlink ?>"><?php echo $idval ?></a></li>
						<li><a href="#">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
	</body>
	<style type="text/css">
		.delta{
			background-color: black;
		}
		#nav a{
			color: white;
		}
	</style>
	</html>

