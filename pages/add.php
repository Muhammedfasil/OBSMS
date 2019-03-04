

<html>
<body>

<select>
<option>Outcome</option>
<?php 
$q=$_GET['q'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"obsms");
$query="SELECT * from outcome where subjectcode='$q'";
$result=mysqli_query($con,$query);
while($rows=mysqli_fetch_assoc($result)):;
	?>

<option ><?php echo $rows['outcomeid'];?></option>
<?php endwhile;



?>

</select>
</body></html>







