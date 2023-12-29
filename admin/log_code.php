<?php
session_start();
include 'connect.php';
$email=$_POST['email'];
$pwd=$_POST['pwd'];

$sql="SELECT * FROM admin WHERE email='$email' AND pwd='$pwd'";
$q=mysqli_query($con, $sql);
if ($row=mysqli_fetch_array($q)){
   // $email=$row['email'];

    $_SESSION['email']=$row['email'];

    header("Location:AdminProfile.php");

}
else{
    echo "something went wrong!";
}
?>
