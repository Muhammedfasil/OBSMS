
<?php 
 session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Outcomes</title>
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
     
  

             <div class="box" style="border-top: 3px solid #00c0ef;">
            <div class="box-header" id="head">
              
              <h3 class="box-title">Outcomes</h3>
               <button type="submit" class="btn btn-info pull-right" style=" margin-left: 10px" onclick="add()">Add Outcome</button>
               <button type="submit" class="btn btn-info pull-right">Bulk Add</button>
               <script type="text/javascript">
                  function add() 
                   {
                     
                       document.getElementById('adding').style.display='inline';
                    document.getElementById('table').style.display='none';
                    document.getElementById('head').style.display='none';

                   }
                 function cancel()
                   {
                    
                    document.getElementById('adding').style.display='none';
                    document.getElementById('table').style.display='inline';

                   }
               </script>
            </div> <!-- /.box-header -->
            <div class="box-body">
               <div  id="adding" class="adding-form" style="display: none;">
                  <center><h2>Add Outcome</h2></center>

                  <form action="outcome.php" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="col-sm-4">
                          <label for="subbb">Subject Code</label>
                         <select class="form-control" class="col-sm-12" name="subjectcode" id="subbb">
                          <option value="subjectcode"  id="sub" selected="selected">Subject Code</option>
                           <!-- subjects as the options -->
                           <?php
                              $f_id=$_SESSION['f_id'];$subquery="SELECT sub_code  FROM subject_details where f_id='$f_id'";
                                $result=mysqli_query($con,$subquery); 
                                 while ($roww=mysqli_fetch_assoc($result)):;?>
                                   <option value="<?php echo $roww['sub_code'];?>"><?php echo $roww['sub_code'];?></option>
                                   <?php endwhile;?>
                                 </select>
                               </div>
                               <div class="col-sm-4">
                                <label for="outid">Outcome ID</label>
                                <input type="text" class="form-control col-sm-12" name="outid" id="outid" placeholder="Outcome ID">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-8" style="margin-top: 10px">
                                <label for="outdef">Outcome Definition</label>
                                <input type="text" class="form-control col-sm-12" name="outdef" id="outdef" placeholder="Define Outcome" style="margin-top:10px">
                              </div>
                            </div>
                          </div>
                        <div class="col-sm-12" style="margin-top: 10px">
                            <div class="col-sm-4">
                            <button type="submit" name="add" style="width: 120px" class="btn btn-success " >Add</button>
                          </div>
                             <div class="col-sm-4">
                            <button type="submit" name="cancel" class="btn btn-danger" style="width: 120px" onclick="cancel()">Cancel</button>
                          </div>
                          </div>
                          </form>
                        </div>
                      
         
                   <?php
                    if (isset($_POST['add']))
                        {
                        $subcode=$_POST['subjectcode'];                          
                          $outid=$_POST['outid'];
                          $outdef=$_POST['outdef'];
                          $fid=$_SESSION['f_id'];
                          $qu="INSERT INTO outcome VALUES ('$subcode','$outid','$outdef','$fid')";
                          if (mysqli_query($con,$qu))
                          {
                            echo "<script>window.alert('Adding successfull')</script>";
                          }
                          else
                          {
                            echo "<script>alert('Adding failed');</script>";
                          }
                        }
                       
                  ?>
                <!-- </div> -->
          <div id="table" style="display: inline;"class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                   <thead>
                    <tr>
                     <th>Subject Code</th>
                     <th>Outcome ID</th>
                     <th>Outcome Definition</th>
                    </tr>
                   </thead>
                   <tbody>
                     <?php
                      include("connection.php");
                      $fid=$_SESSION['f_id'];
                      $qu1="SELECT * FROM outcome where f_id='$fid'";
                      $result=mysqli_query($con,$qu1);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        echo "<tr>";
                        echo "<td>";
                        echo $row['subjectcode'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['outcomeid'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['outcome_definition'];
                        echo"</td>";
                      }
                     ?>
                   </tbody>
                  </table>
            </div> 
           
           <!-- table div -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
        </div>
                    <?php
    include("footer.php");
    ?>
   
        <!-- /.col -->
      </div>
      <!-- /.row -->

       
    </section>
    <!-- /.content -->

  </div>
</div>

    </section>

    <!-- /.content -->

  </div>


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
