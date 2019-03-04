<?php 
session_start();
include("connection.php");


$qpid=$_GET['qpid'];
$query2="SELECT * from question where qpid='$qpid'";
$result2=mysqli_query($con,$query2);

$numr=mysqli_num_rows($result2);
echo "<input type='text' value='".$numr."' id='numr' style='display:none'>";
echo "<center><h3>Enter Marks Here</h3></center><br>";
for($i=1;$i<=$numr;$i++)
{

	echo "<div class='col-sm-4' ><span style='margin-bottom:20px; border:none;' class='form-control'>Q".$i."</span></div><div  class='col-sm-6'><input type='text' name='mark' id='q".$i."'class='form-control' style='margin-bottom:20px'></div>";
}

echo "<div class='col-sm-6'><input type=button style='width: 120px; margin:0;' class='btn   btn-danger' value='Cancel' onclick='can()'></div><div class='col-sm-6'><input type='button' style='width: 120px; margin-left:150px;' class='btn   btn-success' value='Save' onclick='entry();'> </div>";


?>