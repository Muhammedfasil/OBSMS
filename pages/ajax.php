


<?php
include("include.php");
$sub=$_POST['va'];
$selquery="SELECT outcomeid  FROM outcome where subjectcode='$sub'";
$res=mysqli_query($con,$selquery);
while ($row=mysqli_fetch_assoc($res)):;?>
<option value="<?phpecho $row['outcomeid'];?>">
	<?php echo $row['outcomeid'];?>
</option>
<?php endwhile;
?>