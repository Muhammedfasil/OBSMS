

<html>
<body>

<select>
<option>Outcome</option>
<?php 
$q=$_GET['q'];
include("connection.php");
$query="SELECT * from outcome where subjectcode='$q'";
$result=mysqli_query($con,$query);
while($rows=mysqli_fetch_assoc($result)):;
	?>

<option ><?php echo $rows['outcomeid'];?></option>
<?php endwhile;



?>

</select>
</body></html>







