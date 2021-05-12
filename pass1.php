<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Password recovery</title>
	<link rel="stylesheet" href="update.css">
</head>
<body>
	<form action="otpvalid.php"  method="POST">
	<div class="container">
	<h1><center>Password Recovery</center></h1><hr>
	
		<?php include "dbconfig.php";
		include "passsession.php";
		$mail = $_SESSION['email'];?>
		<label><b>Email</b></label><br>
			<input type="email" name="mail1" value =<?php echo"$mail" ?> required>
			
		<label><b>OTP</b></label><br>
			<input type="text" name="otp" required>
	
	
	
		<input id="submit" class="center" type="submit" name="rcvotp" value="Submit">
	</div>
	</form>
	
</body>
</html>
