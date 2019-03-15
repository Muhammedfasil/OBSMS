<?php 
include ('connection.php');
$id=$_GET['id'];
$result2=mysqli_query($con,"SELECT * from question where qpid='$id'");
 while($rows=mysqli_fetch_assoc($result2))
 {
    $series=$rows['series'];
    $subcode==$rows['subcode'];
 }












                       
      
                           $selectquery="SELECT * from question where qpid='$id' ORDER BY qno ";
                           $result=mysqli_query($con,$selectquery);
                            echo "<center><h4>GOVT. POLYTECHNIC COLLEGE</h4></center>";
                            $subresult=mysqli_query($con,"SELECT * from subject_details WHERE sub_code='$subcode'");
                            while($subrow=mysqli_fetch_assoc($subresult))
                            {
                                $subname=$subrow['sub_name'];
                            }
                            echo $subname;
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
                            echo "<button  style='display:none' id='spanid' value='".$id."'>".$id."</button>";
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<tr><td>Qno</td><td>Question</td><td>Mark</td></tr>";
                           while($rows=mysqli_fetch_assoc($result))
                           {
                            echo "<tr><td>".$rows['qno']."</td><td>".$rows['question']."</td><td>".$rows['mainmark']."</td></tr>";
                           
                        }
                         echo "</table>";
                         
 ?>