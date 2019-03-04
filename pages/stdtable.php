<?php
session_start();
$batch=$_GET['batch'];
include("connection.php");
$query="SELECT * from student_details  where batch='$batch' order by regno";
$result=mysqli_query($con,$query);
$i=1;
echo "<table class='table table-bordered table-striped'><tr><th>regno</th><th>Name</th>";

while($rows=mysqli_fetch_assoc($result))
{  
	echo "<tr><td>";
	echo $rows['regno'];
	echo "</td>";
    echo "<td>";
	echo "".$rows['name']."</td><tr id='marklist".$i."''></tr></tr></tr>";
    $i++;
}
echo "</table>";
echo "<input type='text' id='num' value='".$i."' >";
?>