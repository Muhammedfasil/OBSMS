
<?php 
 session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Subjects</title>
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
      include('include.php');
  ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
           
            
    <section class="content-header">
         <div class="box">
      
               
                <script type="text/javascript">
                  function add() 
                   {
                     
                       document.getElementById('adding').style.display='block';
                       document.getElementById('table').style.display='none';
                       document.getElementById('testid').style.display='none';


                   }
                   function cancel()
                   {
                   
                    document.getElementById('adding').style.display='none';
                       document.getElementById('table').style.display='block';

                   }
           </script>
            
         
        
          <div class="box box-info" >
            <div class="box-header" id="testid">
                 <div class="box-header with-border">
              <h3 class="box-title">Subjects</h3>
              <button type="submit" class="btn btn-info pull-right" style=" margin-left: 10px" onclick="add()">Add Subject</button>
               <button type="submit" class="btn btn-info pull-right">Bulk Add</button>
            </div>
            
            </div>



      <div class="box-body">
             <div  id="adding" class="adding-form" style="display: none;">
              <center><h2>Add Subject</h2></center>
          
                  <form action="subjects.php" method="post">
                     <div class="form-group">
                     <div class="col-sm-12" style="margin-bottom: 15px">
                      <div class="col-sm-4">
                        <label for="subcode">Subject Code</label>
                     <input type="text" class="form-control " name="subcode" id="subcode" placeholder="Subject code">
                   </div>
                     </div>
                     <div class="col-sm-12" style="margin-bottom: 15px">
                     <div class="col-sm-6">
                      <label for="subname">Subject Name</label>
                     <input type="text" class="form-control" name="subname" id="subname" placeholder="Subject Name">
                   </div>
                     </div>
                     </div>
                    <div class="col-sm-12" style="margin-bottom: 15px">
                      <div class="col-sm-4">
                      <button type="submit" name="cancel" class="btn btn-danger" onclick="cancel()">Cancel</button>
                    </div>
                    <div class="col-sm-6">
                     <button type="submit" name="add" style="width: 120px" class="btn btn-success ">Add</button>
                   </div>
                 </div>
                    
                     
                     
                     </form> 
          <!-- Horizontal Form -->
        </div>
        
            <!-- form start -->
            
      
       <?php
             include("connection.php");
             if (isset($_POST['add']))
                        {
                          $subjectcode=$_POST['subcode'];
                          $subname=$_POST['subname'];
                         $f_id=$_SESSION['f_id'];
                          $qu="INSERT INTO subject_details VALUES ('$subjectcode','$subname','$f_id')";
                          if (mysqli_query($con,$qu))
                          {
                            echo "<script>window.alert('Adding successfull')</script>";
                          }
                          else
                          {
                            echo "error is",mysqli_error($con);
                          }
                        }
                          ?>

        
                <div id="table" class="table-responsive">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>subject name</th>
                  <th>faculty</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");
                       $fid=$_SESSION['f_id'];
                      $qu1="SELECT * FROM subject_details where f_id='$fid'";
                      $result=mysqli_query($con,$qu1);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['sub_code'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['sub_name'];
                        echo"</td>";
                       
                                                echo "<td>";
                        echo $row['f_id'];
                        echo"</td>";
                      }
                     

                    
                      
                    ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
         
             </section>
      </div>
          
 <?php 
             include('footer.php'); ?>

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
