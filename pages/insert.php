<?php 

$sub=$_GET['subcode'];

$series=$_GET['series'];

$outcome=$_GET['outcome'];

$qpid=$_GET['qpid'];

$qno=$_GET['qno'];

$question=$_GET['question'];

$mark=$_GET['mark'];


include ('connection.php');












 $addquery="INSERT INTO question values ('$qpid',$sub ,'$series','$outcome','$qno','$question','$mark')";
                        if (mysqli_query($con,$addquery)) 
                        {
                          
                           


                           }                        
      
                           $selectquery="SELECT * from question where qpid='$qpid' ORDER BY qno";
                           $result=mysqli_query($con,$selectquery);
                            echo "<center><h4>GOVT. POLYTECHNIC COLLEGE</h4></center>";
                            if($series=='SE01')
                            {
                            	echo "<center><h4>FIRST SERIES EXAM</h4></center>";
                            }
                            elseif ($series=='SE02') {
                            	echo "<center><h4>SECOND SERIES EXAM</h4></center>";
                            }
                            elseif($series=='SE03')
                            {
                            	 echo "<center><h4>THIRD SERIES EXAM</h4></center>";
                            }
                            else
                            {
                            	echo "<center><h4>______________________</h4></center>";
                            }
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<tr><td>Qno</td><td>Question</td><td>Mark</td></tr>";
                           while($rows=mysqli_fetch_assoc($result))
                           {
                            echo "<tr><td>".$rows['qno']."</td><td>".$rows['question']."</td><td>".$rows['mainmark']."</td></tr>";
                           
                        }
                         echo "</table>";
 ?>