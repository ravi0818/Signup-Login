<?php 
	session_start(); 
	$_SESSION['loggedin']=false;
?>
<?php
include 'snippet/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT * FROM user_details WHERE email='$email' AND password='$password'";
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	if ($num==1) {
		session_start();
		$_SESSION['loggedin']=true;
		header("location: dashboard.php");
	} else {
		echo '<script>alert("Invalid Credentials")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'snippet/links.php' ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 leftside">
				<div class="col-lg-12 leftmid">
					<h2>Welcome to stoke</h2><br>
					<p>Let's light some fire and get the show on the road...</p>
				</div>
                <div class="col-lg-12 p-3 pr-5 leftbottom">
					<div class="d-flex justify-content-between">
						<div class="p-2 bd-highlight">
							<i class="fa fa-linkedin pr-3" aria-hidden="true"></i>
							<i class="fa fa-facebook pr-3" aria-hidden="true"></i>
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</div>
						<div class="p-2 bd-highlight">Privacy Policy</div>
						<div class="p-2 bd-highlight">&copy 2021 Stoke</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mx-auto form-div">
				<h2 class="text-center">Log in</h2><br>
				<form action="" method="POST">
					<div class="form-group">
						<label for="email">Work Email</label>
						<input type="text" class="form-control" placeholder="Work Email" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-group form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Remember me
						</label>
					</div><br>
					<button type="submit" class="btn btn-primary">Log in</button>
				</form>
				<div class="pt-5"><sapn>Not registered? <a href="index.php">Sign up</a></span></div>
			</div>
		</div>
	</div>
	


	<?php
	$conn->close();
	?>
</body>
</html>