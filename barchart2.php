<?php 
require "dbconfig.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
.logo{
 background-color: #4CAF50;
	color: white;
	padding: 10px 20px;
	margin: 8px 10px;
	border: none;
	cursor: pointer;
	opacity:0.9;
	float:right;
	
}
.logo:hover {
 opacity:2.5;
}

	
</style>
  </head>
  	<title>BAR GRAPH</title>
    
  
  
        <?php
			
		$a=mysqli_query($conn,"select * from stucourse where issuedate LIKE '%2019%' ");
		$aa= mysqli_num_rows($a);
	
		$b=mysqli_query($conn,"select * from faccourse where issuedate LIKE '%2020%' ");
		$bb= mysqli_num_rows($b);
		
		$c=mysqli_query($conn,"select * from faccourse where issuedate LIKE '%2021%' ");
		$cc= mysqli_num_rows($c);
		
		$d=mysqli_query($conn,"select * from faccourse where issuedate LIKE '%2018%'");
		$dd= mysqli_num_rows($d);
		
		
		?>
		<script type="text/javascript">
			  google.charts.load('current', {'packages':['corechart']});
			  google.charts.setOnLoadCallback(drawChart);

			  function drawChart() {

				var data = google.visualization.arrayToDataTable([
					['Year',     'Number of courses'],
					['2019',     <?php echo $aa;?>],
					['2020',     <?php echo $bb;?>],
					['2021',     <?php echo $cc;?>],
					['2018',     <?php echo $dd;?>],


				]);

				var options = {
				  title: 'Year wise MOOC Courses'
				};
				
				var options = {
				  'legend':'left',
				  'title':'Year wise MOOC Courses',
				  'is3D':true,
				  'width':500,
				  'height':400
				}

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
			  }
		</script>
  
  <body>
		<a href="adminhomepage2.php"><button class="logo"><b> BACK </b></button></a>
	
	    <div id="piechart" style="width: 800px; height: 600px;"></div>

  </body>
</html>


