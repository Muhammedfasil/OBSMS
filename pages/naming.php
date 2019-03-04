<?php
include("connection.php");
$reg=$_GET['reg'];
$query="SELECT * from student_details where regno='$reg'";
$result=mysqli_query($con,$query);
echo "<table class='table table-striped table-bordered table-hover ' style='border:1px solid red'>";
while($rows=mysqli_fetch_assoc($result))
{      
	   echo "<tr class='success'><td ><b>Name</b></td><td >";
        echo "".$rows['name']."</td></tr>";

            
        echo "<tr class='info' ><td ><b>Admission Number</b></td><td>";
        echo "".$rows['admnno']."</td></tr>";
         
        echo "<tr class='warning'><td><b>Department</b></td><td >";
        echo "".$rows['department']."</td></tr>";


        echo "<tr class='danger' ><td ><b>Semester</b></td><td >";
        echo "".$rows['semester']."</td></tr>";
}

?>