
<?php 
include "facsession.php";
require "dbconfig.php";

$id=$_SESSION['id'];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
			
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
	<script type="text/javascript">
		function delete_id(id)
		{
			 if(confirm('Do you really want to delete this record? This process cannot be undone.'))
			 {
				window.location.href='facdelete.php?delete_id='+id;
			 }
		}
	</script>
</head>
<body>

	
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Welcome,<?php echo " $id" ?>:</h2>
                        <a href="faclogout.php" class="btn btn-danger pull-right">Logout</a>

                    </div>
					<a href="facultyinsert.html" class="btn btn-success pull-left">Add New course</a><br><br><br>
                    <?php
                   
                    // Attempt select query execution
					//$usn=$_SESSION['id'];
                    $sql = "SELECT * FROM faccourse where id='$id' order by(infoid) DESC ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th><center>Info ID</center></th>";
                                        echo "<th><center>Course Name</center></th>";
                                        echo "<th><center>Course Authority</center></th>";
                                        echo "<th><center>Issuedate</center></th>";
                                        echo "<th><center>Action</center></th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td><center>" . $row['infoid'] . "</center></td>";
                                        echo "<td><center>" . $row['title'] . "</center></td>";
                                        echo "<td><center>" . $row['authority'] . "</center></td>";
                                        echo "<td><center>" . $row['issuedate'] . "</center></td>";
                                        echo "<td><center>";
                                            echo "<a href='facuploads/".$row['file']."' target='_blank' title='View file' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
										
                                            echo "<a href='facupdate1.php?id=". $row['infoid'] ."' title='Update' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='javascript:delete_id( $row[0])' title='Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td></center>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                   ?>
                </div>
            </div>        
        </div>
		</div>
	</body>
</html>
