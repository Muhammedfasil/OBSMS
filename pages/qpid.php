<?php 
session_start();
include("connection.php");
$sub=$_GET['sub'];
$_SESSION['sub']=$sub;
$query="SELECT DISTINCT qpid from question where subcode='$sub'";
$result=mysqli_query($con,$query);

echo "<option>Select QPID </option>";
while($rows=mysqli_fetch_assoc($result))
{
	echo "<option value='".$rows['qpid']."'>".$rows['qpid']."</option>";
}





?>