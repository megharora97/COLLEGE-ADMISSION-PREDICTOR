<?php 
session_start(); 

// if (!isset($_SESSION['username'])) {
// 	$_SESSION['msg'] = "You must log in first";
// 	header('location: login.php');
// }

// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['username']);
// 	header("location: login.php");
// }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Rank Predictor | Contact </title>
	<link rel="stylesheet" type="text/css" href="css/sitestyle.css">
</head>
<body>

	<!-- logged in user information -->
	<header>
		<div>
			<div id="branding">
				<h1><span class="highlight"> College </span> Predictor</h1>
			</div>
			<nav>
				<ul>
					<li class="mine1"><a href="website.php">Home</a></li>
					<li class="mine1"><a href="collegerank.php">College Rankings</a></li>
					<li class="mine1"><a href="index.php">Predict</a></li>
					<li class="mine1"><a href="blog.php">Blog</a></li>
					<li class="current"><a href="contactus.php">Contact Us</a></li>
					<button class="button_1">
						<?php  if (isset($_SESSION['username']))
							echo '<a href="index.php?logout=\'1\'">logout</a>';
							else echo'<a href="index.php">Login</a>';
						?>
					</button>	
				</ul>
			</nav>
		</div>
	</header>
	<div class="container">
        <h3>Project Members</h3>
        <ol>
            <li>Megha Arora</li>
	        <li>Ridhima Aggarwal</li>
	        <li>Shaunak Arora</li>
            <li>Siddarth Aswal</li>
        </ol>
    </div>
</body>
</html>