<?php
	include ('connect.php');

	
	$admin_users = $_POST['admin_user'];
	$admin_pass = $_POST['admin_pass'];

	$fetch = $con->prepare("SELECT id FROM admin WHERE admin_user = ? AND admin_pass = ? ");
	$fetch->execute(array($admin_users, $admin_pass));
	$count = $fetch->rowcount();
	$row = $fetch->fetch();

	if($count > 0) {
		session_start();
		$_SESSION['id'] = $row['id'];
		echo "<script> window.location = 'home.php'; </script>";
	} else {
		
		echo "<script>alert('Wrong Username or Password');</script>";
		echo "<script> window.location = 'index.php'; </script>";
	}
	
?>
