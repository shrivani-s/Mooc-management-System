<?php

include "dbconfig.php";
include "passsession.php";
if(isset($_POST['rcvotp'])){
	
$mail = $_SESSION['email'];
$rcvotp = $_POST['otp'];
//echo $mail;

$sql = "select * from stulogin where email = '$mail' ";
$res = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($res)) {
	$dbotp= $row['otp'];
}


if($dbotp == $rcvotp)
{
	header('refresh:0;url=setpass.php?');
}
else
{
	echo "<script>alert('OTP mismatch')</script>";
	header ('refresh:0;url=pass1.php');
}
}
?>	