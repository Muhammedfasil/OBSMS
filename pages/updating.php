<?php 
include ("connection.php");
$id=$_GET['id'];
$delete="DELETE FROM question where qpid='$id'";
if (mysqli_query($con,$delete)) {
	echo "deleted";
}


?>