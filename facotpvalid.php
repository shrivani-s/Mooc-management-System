<?php

include "dbconfig.php";
include "facpasssession.php";
if(isset($_POST['rcvotp'])){
	
$mail = $_SESSION['email'];
$rcvotp = $_POST['otp'];
//echo $mail;

$sql = "select * from faclogin where email = '$mail' ";
$res = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($res)) {
	$dbotp= $row['otp'];
}


if($dbotp == $rcvotp)
{
	header('refresh:0;url=facsetpass.php?');
}
else
{
	echo "<script>alert('OTP mismatch')</script>";
	header ('refresh:0;url=facpass1.php');
}
}
?>	