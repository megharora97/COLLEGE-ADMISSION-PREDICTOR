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
	<style type="text/css">
		#customers {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #CCC;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #E8491D;
			color: white;
		}
	</style>
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
		<?php
		if(isset($_GET['cid'])) {
			$con = mysqli_connect('localhost', 'root', '', 'college');

			$cid = mysqli_real_escape_string($con, $_GET['cid']);
			$query = "SELECT * FROM `clg_mrks` WHERE cid=".$cid;
			$result = mysqli_query($con, $query);


			if($result) {
					$row=mysqli_fetch_row($result);
					echo '<h1>'.$row[1].'<small> ('.$row[2].')</small></h1><hr><p><strong>Cut-off: </strong>'.$row[3].'<br>'.$row[4].'</p><p><strong><u>Contact</u></strong><br>Website: <a href="http://www.'.$row[5].'">http://www.'.$row[5].'</a><br>Phone: (+91)'.$row[6].'</p>';
			} else echo 'Error fetching content. Try again in a while...';
		}
		?>
	</div>
</section>

</body>
</html>