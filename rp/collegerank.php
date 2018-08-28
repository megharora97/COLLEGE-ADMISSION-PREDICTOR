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
	<title>Rank Predictor | Colleges </title>
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
					<li class="current"><a href="collegerank.php">College Rankings</a></li>
					<li class="mine1"><a href="index.php">Predict</a></li>
					<li class="mine1"><a href="blog.php">Blog</a></li>
					<li class="mine1"><a href="contactus.php">Contact Us</a></li>
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
		<h3>Top 20 Engineering College</h3>
		<ol class="list1">
			<li>IIT Kanpur</li>  
			<li>IIT Kharagpur</li> 
			<li>IIT Bombay</li>
			<li>IIT Madras</li>
			<li>IIT Delhi</li>
			<li>BITS Pilani</li>
			<li>IIT Roorkee</li>
			<li>IT-BHU</li>
			<li>IIT Guwahati</li>
			<li>College of Engg,Anna University</li>
		</ol>
		<?php
		$con = mysqli_connect('localhost', 'root', '', 'college');

		$query = "SELECT cid,name FROM `clg_mrks`";
		$result = mysqli_query($con, $query);

		if($result) {
			echo '<h3>List of All Engineering Colleges</h3><ol class="list1">';
			for ($i=0; $i<mysqli_num_rows($result) ; $i++) {
				$row=mysqli_fetch_row($result);
				echo '<li><a href="college.php?cid='.$row[0].'">'.$row[1].'</a></li>';
			}
			echo "</ol>";
		} else echo 'error';		?>
	</div>
</body>
</html>