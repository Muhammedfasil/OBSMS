
<?php 
 session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Addstudent</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php
 include("include.php");
 ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
           
      


<!-- <div class="box"  style="border-top: 3px solid #00c0ef;"> -->
      
<div class="box">

            <div class="box-header" id="head">
              <h1 class="box-title">Student details</h1>
               <button type="submit" class="btn btn-info pull-right" style=" margin-left: 10px" onclick="add()">Add Student</button>
               <button type="submit" class="btn btn-info pull-right" onclick="parent.location='excel.php'">Bulk Add</button>

                <script type="text/javascript">
                  function add() 
                   {
                      document.getElementById('addingg').style.display='block';
                      document.getElementById('head').style.display='none';
                      document.getElementById('adding').style.display='none';
            }

           </script>
            </div>
         


            <div class="box-body" >
              <div  id="addingg" class="adding-form" style="display: none;">
          <center> <h2>Add Students</h2> </center>

                      <form action="addstudent.php" method="post">
                        <div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >
                              <label for="regno">Register Number</label>
                              <input type="text"  name="regno" placeholder="Register number" id="regno" class="form-control ">
                          </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom: 10px;margin-top: 10px">
                          <div class="col-md-6">
                            <label for="admnno">Admission Number</label>
                              <input type="text" class="form-control" name="admnno" id="admnno" placeholder="Admission number">
                          </div>
                        </div>
                       
                         <div class="col-sm-12" style="margin-bottom: 10px">
                          <div class="col-sm-8">
                            <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                          </div>
                        </div>
                       
                       <div class="col-sm-4" style="margin-bottom: 10px">
                          <div class="col-sm-12">
                            <label for="dept">Department</label>
                              <select class="form-control " id="dept" name="dept">
                                <option value="">Department</option>
                                <option value="CHE">Computer Hardware Engineering</option>
                                <option value="MECH">Mechanical Engineering</option>
                                <option value="CIVIL">Civil Engineering</option>
                                <option value="EEE">Electrical and Electronics Engineering</option>
                                <option value="IT">Instrumentation Technology</option>
                                <option value="EC">Electronics and Communication</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-sm-8" style="margin-bottom: 10px">
                          <div class="col-sm-6">
                            <label for="batch">Batch</label>
                              <input type="text" class="form-control" id="batch" name="batch" placeholder="Batch">
                          </div>
                        </div>
                        <div class="col-sm-4" style="margin-bottom: 10px">
                          <div class="col-sm-12">
                            <label for="semester">Semester</label>
                              <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                          </div>
                        </div>
                       

                        <div class="col-sm-12" style="margin-bottom: 10px;">
                          <div class="col-sm-4">
                            
                              <input type="submit" style="width: 150px;margin-top: 22px;" class="btn btn-success" name="add" value="Add">
                          </div>    <div class="col-sm-4">
                            
                              <input type="button" style="width: 150px;margin-top: 22px;" class="btn btn-danger" name="cancel" value="Cancel" onclick="parent.location='addstudent.php'">
                          </div>
                        </div>
                      </form>
         </div>


         <?php 
               if (isset($_POST['add'])) 
               {
                  $regno=$_POST['regno'];
                  $name=$_POST['name'];
                  $dept=$_POST['dept'];
                  $admnno=$_POST['admnno'];
                  $batch=$_POST['batch'];
                  $semester=$_POST['semester'];

                  $query="INSERT into student_details values('$regno','$name','$dept','$admnno','$batch','$semester')";
                  if (mysqli_query($con,$query)) 
                  {
                     echo "<script>alert('student added');</script>";
                  }
                  else
                  {
                      echo "<script>alert('student not added');</script>";
  
                  }
               }

         ?>



             
                    <div id="adding" class="table-responsive"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Register number</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Admission number</th>
                  <th>Batch</th>
                  <th>Semester</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      $qu1="SELECT * FROM student_details ORDER BY regno";
                      $result=mysqli_query($con,$qu1);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        echo "<tr >";
                        echo "<td>";
                        echo $row['regno'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['name'];
                        echo"</td>";
                       
                                                echo "<td>";
                        echo $row['department'];
                        echo"</td>";
                      
                        echo "<td>";
                        echo $row['admnno'];
                        echo"</td>";
                    
                        echo "<td>";
                        echo $row['batch'];
                        echo"</td>";
                       
                        echo "<td>";
                        echo $row['semester'];
                        echo"</td>";
                        echo"</tr>";
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
              </section>

          <!-- /.box -->
    

         <?php
    include("footer.php");
    ?>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>