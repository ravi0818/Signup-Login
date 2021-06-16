<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
	header("location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'snippet/links.php' ?>
</head>
<body>
	<div class="container-fuild dashboard">
		<div class="row">	
		<div class='col-lg-3 mx-auto p-2' style="margin-top:20%">
		<div>Logged in successfully.....</div><br>
		<a href="snippet/logout.php" class="btn btn-primary p-3 w-100">Log Out</a>
		</div>			
		</div>
	</div>

</body>
</html>



