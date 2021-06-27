<?php
session_start();
$_SESSION['loggedin'] = false;
?>
<?php
include 'snippet/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if ($password != $cpassword) {
		echo '<script>alert("Password mismatch")</script>';
	} else if (strlen($password) < 8) {
		echo '<script>alert("Password is too short")</script>';
	} else {
		$sql = "SELECT * FROM user_details WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);
		if ($num == 0) {
			$sql = "INSERT INTO user_details (fname,lname,dob, email, password)
			VALUES ('$fname','$lname','$dob', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("location: login.php");
			} else {
				echo '<script>alert("Error")</script>';
			}
		} else {
			echo '<script>alert("Email is already registered")</script>';
		}
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
			<?php include 'snippet/leftside.php' ?>
			<div class="col-lg-6 mx-auto form-div">
				<h2 class="text-center">Sign up</h2><br>
				<form action="" method="POST">
					<div class="row form-group">
						<div class="col">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" placeholder="First name" name="fname" required>
						</div>
						<div class="col">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" placeholder="Last name" name="lname" required>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" placeholder="Email" name="email" required>
					</div>
					<div class="form-group" style="width:48%">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" placeholder="" name="dob" required>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="password">Password</label>
							<input type="password" class="form-control" placeholder="Minimum 8 characters" name="password" required>
						</div>
						<div class="col">
							<label for="cpassword">Confirm Password</label>
							<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
						</div>
					</div>
					<div class="form-group form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Remember me
						</label>
					</div><br>
					<button type="submit" class="btn btn-primary">Sign Up</button>
				</form>
				<div class="pt-5">
					<sapn>Existing user? <a href="login.php">Log in</a></span>
				</div>
			</div>
		</div>
	</div>



	<?php
	$conn->close();
	?>
</body>

</html>