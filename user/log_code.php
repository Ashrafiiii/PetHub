<?php
session_start();
include 'connect.php';
$phone_no=$_POST['phone_no'];
$pwd=$_POST['pwd'];

$sql="SELECT * FROM users WHERE phone_no='$phone_no' AND pwd='$pwd'";
$q=mysqli_query($con, $sql);
if ($row=mysqli_fetch_array($q)){
   // $email=$row['email'];

    $_SESSION['email']=$row['email'];
    $_SESSION['u_id']=$row['u_id'];

    //echo "u_id: ". $_SESSION['u_id'];

    header("Location:UserProfile.php");

}
else{
    echo "something went wrong!";
}
?>
