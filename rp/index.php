<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Rank Predictor | Predict </title>
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
					<li class="mine1"><a href="collegerank.php">College Rankings</a></li>
					<li class="current"><a href="index.php">Predict</a></li>
					<li class="mine1"><a href="blog.php">Blog</a></li>
					<li class="mine1"><a href="contactus.php">Contact Us</a></li>
					<button class="button_1">
						<?php  if (isset($_SESSION['username'])) : ?>
							<a href="index.php?logout='1'">logout</a>
						<?php endif ?>
					</button>			
				</ul>
			</nav>
		</div>
	</header>
	<div class="container">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
			Welcome <strong><?php echo $_SESSION['username']; ?></strong>
		<?php endif ?>
		<form action="index.php" method="GET">
			<label for="marks">Your JEE Score:</label><br>
			<input type="text" id="marks" name="marks">
			<input type="submit" class="button_1">
		</form>
		<?php
		if(isset($_GET['marks'])) {
			$con = mysqli_connect('localhost', 'root', '', 'college');

			$marks = mysqli_real_escape_string($con, $_GET['marks']);
			$query = "SELECT * FROM `clg_mrks` WHERE marks<=".$marks." ORDER BY marks DESC";
			$result = mysqli_query($con, $query);

			if($result) {
				echo "Your marks: ".$_GET['marks'];
				echo '<table id="customers"><tr><th>College</th><th>City</th><th>Cut-Off</th></tr>';
				for ($i=0; $i<mysqli_num_rows($result) ; $i++) {
					$row=mysqli_fetch_row($result);
					echo "<tr>";
					echo "<td><a href='college.php?cid=".$row[0]."'>".$row[1]."</a></td>";
					echo '<td>'.$row[2].'</td>';
					echo '<td>'.$row[3].'</td>';
					echo "</tr></a>";
				}
				echo "</table>";
			} else echo '<strong style="color:#D00;font-size:1.1em;">Invalid Marks</strong>';
		}
		?>
	</div>
</section>

</body>
</html>