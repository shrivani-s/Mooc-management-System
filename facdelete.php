<?php
include "facsession.php";
require "dbconfig.php";

if(isset($_GET['delete_id']))
{
	
	$sql = "DELETE FROM faccourse WHERE infoid=".$_GET['delete_id']."  " ;

	if(mysqli_query($conn,$sql)){
	 
		echo '<script>alert("Data deleted")</script>';
		header('refresh:1;url=fachomepage.php');
		
	}
		else{
			echo '<script>alert("Error")</script>';
			header('refresh:1;url=fachomepage.php');
		}
}


?>