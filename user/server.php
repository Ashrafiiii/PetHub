<?php 
include "connect.php";
error_reporting(0);

session_start(); // Start the session

if (isset($_POST['login'])) {
	$phone_no = $_POST['phone_no'];
	$pwd = $_POST['pwd'];

	$q = "SELECT * FROM user WHERE phone_no='$phone_no' AND pwd='$pwd'";
	$data = mysqli_query($con, $q);

	if (mysqli_num_rows($data) == 1) {
		$_SESSION['phone_no'] = $phone_no;
		header("Location: UserDashboard.php"); 
		exit(); 
	} else {
		echo "SERVER ERROR";
	}
}
?>
