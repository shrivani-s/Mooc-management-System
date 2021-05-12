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
.graph {
    display: inline-block;
}

.graph label {
    display: block;
}
	
</style>
  </head>
  	<title>BAR GRAPH</title>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         // ['title','issuedate'],
		   ['Semester', 'Number of MOOC Courses'],
		   
		   
        <?php
		//$num=mysqli_num_rows($res);
		$sem5 = "SELECT a.name,a.usn,a.department,a.semester,a.section,e.title,e.authority,e.issuedate
	 FROM stulogin as a,stucourse as e WHERE  a.usn = e.usn and semester=5 "; 
	$res5=mysqli_query($conn,$sem5);
		$s5=mysqli_num_rows($res5);
		
		$sem7 = "SELECT a.name,a.usn,a.department,a.semester,a.section,e.title,e.authority,e.issuedate
	 FROM stulogin as a,stucourse as e WHERE  a.usn = e.usn and semester=7 "; 
	$res7=mysqli_query($conn,$sem7);
		$s7=mysqli_num_rows($res7);
		
		
		$sem3 = "SELECT a.name,a.usn,a.department,a.semester,a.section,e.title,e.authority,e.issuedate
	 FROM stulogin as a,stucourse as e WHERE  a.usn = e.usn and semester=3"; 
	$res3=mysqli_query($conn,$sem3);
		$s3=mysqli_num_rows($res3);
		
		
		
		echo"['III SEM',$s3],";
		echo"['V SEM',$s5],";
		echo"['VI SEM',$s7]";
	
		?>
		]);
		var options = {
          chart: {
            title: 'Semester Wise MOOC Courses',
            
          }
        };
		

        var chart = new google.charts.Bar(document.getElementById('chart1'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  
 	   
        <?php
			
		$a=mysqli_query($conn,"select * from stucourse where issuedate LIKE '%2019%' ");
		$aa= mysqli_num_rows($a);
	
		$b=mysqli_query($conn,"select * from stucourse where issuedate LIKE '%2020%' ");
		$bb= mysqli_num_rows($b);
		
		$c=mysqli_query($conn,"select * from stucourse where issuedate LIKE '%2021%' ");
		$cc= mysqli_num_rows($c);
		
		$d=mysqli_query($conn,"select * from stucourse where issuedate LIKE '%2018%'");
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
		<a href="adminhomepage1.php"><button class="logo"><b> BACK </b></button></a>

		<div id="chart1"  class="graph" style="width: 500px; height:400px; padding:20px; " > </div>
	
	    <div id="piechart" class="graph"></div>

  </body>
</html>


