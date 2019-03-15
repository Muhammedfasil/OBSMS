<?php 
 session_start();
include("connection.php");
 $n=3;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reports</title>
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
           
             <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reports</h3>
               
     </div>
         
            <!-- /.box-header -->
            <div class="box-body">
              
              <form action="markentry.php" method="post" id="mainform">
               
                <div class="box-body">
                    <div class="form-group">
                   
                          <div class="row" style="margin-top:1%;">
                <div class="span10" style="margin-left:30px">
                    <table class="table table-condensed table-striped table-hover tablesorter" style="max-width:95%;font-size:17px;border:1px solid gainsboro">
                        <thead style="background: gainsboro">
                            <tr>
                                <th>
                                    <a href="" class="btn-link" ng-click="reverse=!reverse;orderPrograms('name', reverse)" style="color:black">
                                        <span style="max-width:inherit">Name</span>&nbsp;&nbsp;
                                        <span class="fa fa-sort columnSortIcons" style="right:0px; width:20px"></span>
                                    </a>
                                </th>
                                <th style="text-align:center">Course-PO matrix Report</th>
                                                                    <th style="text-align:center">PO Attainment Report</th>

                                <th style="text-align:center">Upload/Download Indirect Assessment </th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- ngRepeat: program in programs --><tr ng-repeat="program in programs" class="ng-scope">
                                <td style="max-width:20%;  text-align:left; vertical-align:middle;"><span class="ng-binding">Computer Hardware Engineering - 2016 - 2019</span></td>
                                <td style="max-width:10%;" class="td-centered"><a href="repport.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>
                                                                    <td style="max-width:10%;" class="td-centered"><a href="report-po.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>

                                <td style="max-width:10%;" class="td-centered"><span style="cursor:pointer;" ng-click="setProgramId(program.programId,program.name)" data-target="#uploadProgramLevelModal" data-toggle="modal"> <a href="javascript:void(0)" title="upload/download"><i class="fa fa-cloud-upload"></i>&nbsp;<i class="fa fa-cloud-download"></i></a> </span></td>
                            </tr><!-- end ngRepeat: program in programs --><tr ng-repeat="program in programs" class="ng-scope">
                                <td style="max-width:20%;  text-align:left; vertical-align:middle;"><span class="ng-binding">Computer Hardware Engineering - 2017 - 2020</span></td>
                                <td style="max-width:10%;" class="td-centered"><a href="repport.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>
                                                                    <td style="max-width:10%;" class="td-centered"><a href="report-po.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>

                                <td style="max-width:10%;" class="td-centered"><span style="cursor:pointer;" ng-click="setProgramId(program.programId,program.name)" data-target="#uploadProgramLevelModal" data-toggle="modal"> <a href="javascript:void(0)" title="upload/download"><i class="fa fa-cloud-upload"></i>&nbsp;<i class="fa fa-cloud-download"></i></a> </span></td>
                            </tr><!-- end ngRepeat: program in programs --><tr ng-repeat="program in programs" class="ng-scope">
                                <td style="max-width:20%;  text-align:left; vertical-align:middle;"><span class="ng-binding">Computer Hardware Engineering - 2018 - 2021</span></td>
                                <td style="max-width:10%;" class="td-centered"><a href="repport.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>
                                                                    <td style="max-width:10%;" class="td-centered"><a href="report-po.php" style="cursor:pointer" title="view"><i class="fa fa-eye"></i></a></td>

                                <td style="max-width:10%;" class="td-centered"><span style="cursor:pointer;" ng-click="setProgramId(program.programId,program.name)" data-target="#uploadProgramLevelModal" data-toggle="modal"> <a href="javascript:void(0)" title="upload/download"><i class="fa fa-cloud-upload"></i>&nbsp;<i class="fa fa-cloud-download"></i></a> </span></td>
                            </tr><!-- end ngRepeat: program in programs -->
                        </tbody>
                    </table>
                </div>
            </div>
                     </div>
                      <!-- This is Box Body -->
              
                </div>
                
            </form>

             </div>
           </div>
       </section>
   </div>
  <?php 
      include('footer.php');
    ?>

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
