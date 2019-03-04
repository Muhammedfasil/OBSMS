<?php 
include("connection.php");
  $qno=$_GET['qno']+1;
  // echo "$qno<br>";
  $mark=$_GET['mark'];
  // echo "$mark<br>";
  $regno=$_GET['regno'];
  // echo "$regno<br>";
  $subbb=$_GET['subbb'];
  // echo "$subbb<br>";
  $qpid=$_GET['qpid'];
  // echo "$qpid<br>";
  $cquery="SELECT DISTINCT regno from marks where regno='$regno' and subjectcode='$subbb' and qpid='$qpid' and qno='$qno'";
  $result=mysqli_query($con,$cquery);
 
  $num=mysqli_num_rows($result);

  if ($num==0)
  {
   $query="INSERT into marks VALUES ('$regno','$subbb','$qpid','$qno','$mark')";
   if(mysqli_query($con,$query))
   {
   	echo "mark of ".$qno."added";
   }
   else
   {
     echo "error is : ".mysqli_error($con);
   }

  }
  else{
 echo "already exist : ".mysqli_error($con);  }
 
?>