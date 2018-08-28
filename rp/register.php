<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rank Predictor | Register</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
					<li class="mine1"><a href="contactus.php">Contact Us</a></li>			
					<button class="button_1" disabled=""><a href="index.php">Login</a></button>
				</ul>
			</nav>
		</div>
	</header>

	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php" style="margin-bottom: 10vh;">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>

</body>
</html>