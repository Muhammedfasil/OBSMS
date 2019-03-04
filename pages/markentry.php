<?php 
 session_start();
include("connection.php");
 $n=3;
?>
<!DOCTYPE html>
<html>
<head>
     <script type="text/javascript">
                         function can() {
                        
                          location.reload('true');
                         }
                       </script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mark Entry</title>
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
                     <h3 class="box-title">Mark Entry</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                    <!-- <form action="markentry.php" method="post" id="mainform"> -->
                          
                               <div class="form-group">
                                <div class="col-sm-12">
                                       <div id="regnu" class="col-sm-3" >
                                              <label for="regno">Register Number</label>
                                              <input type="text" class="form-control" name="regno" id="regno" oninput="naming(this.value)">
                                            </div>
                                          </div>

                                    <div class="col-sm-12">
                                          <div class="col-sm-3">
                                            <label for="subbb">Subject</label>
                                               <select class="form-control" name="subjectcode" id="subbb" onchange="qpi(this.value)">
                                                        <option value="subjectcode"  id="sub" selected="selected">Subject</option>
                                                        <!-- subjects as the options -->
                                                        <?php 
                                                           $f_id=$_SESSION['f_id'];
                                                           $subquery="SELECT *  FROM subject_details where f_id='$f_id'";
                                                           $result=mysqli_query($con,$subquery);

                                                            while ($roww=mysqli_fetch_assoc($result)):;
                                                           ?>
                                                           <option value="<?php echo $roww['sub_code'];?>"><?php echo ''.$roww['sub_name']. '('.$roww['sub_code']. ')' ;?></option>
                                                           <?php endwhile;?>
                                               </select>
                                          </div>
                                          <script type="text/javascript">
                                            
                                            function qpi(arg)
                                            {
                                              var sub=arg;
                                              var viewxml = new XMLHttpRequest();
                                               viewxml.onreadystatechange = function()
                                                {
                                                     if (this.readyState == 4 && this.status == 200)
                                                      {
                                                          document.getElementById("qpid").innerHTML = this.responseText;

                                                    }
                                               };

                                                        viewxml.open("GET" , "qpid.php?sub=" + sub, true);
                                                        viewxml.send();
                                            }
                                          </script>

                                          
                                          <div class="col-sm-3">
                                            <label for="qpid">Select QPID</label>
                                          
                                                <select id="qpid" class="form-control" onchange='numrows()'>
                                              
                                                    <option>Select QPID</option>    
                                                 </select>
                                                 <br>

                                          </div>
                                               <div class="col-sm-6" id="name" class="table-responsive">
                                              
                                            </div>
                                    </div>
                                     
                                      <div class="col-sm-12" id="stdtable">
                                        
                                      </div>
                               <div class="col-sm-12">
                                 <div id="field" style="padding: 0" class="col-sm-8">
                                                                                        <script type="text/javascript">
                                              function naming(argument) 
                                              {
                                                     var reg=argument;
                                                     var viewxml = new XMLHttpRequest();
                                               viewxml.onreadystatechange = function()
                                                {
                                                     if (this.readyState == 4 && this.status == 200)
                                                      {   
                                                         // for(var nu=1;nu<=num;nu++)
                                                         // {
                                                          document.getElementById("name").innerHTML = this.responseText;
                                                          // }
                                                    }
                                               };

                                                        viewxml.open("GET" , "naming.php?reg=" + reg  , true);
                                                        viewxml.send();

                                              }
                                            </script>
                                          </div>
                                         
                                          
                                          
                                        </div>

                                          <div class="col-sm-12">
                                                 <div  class="col-sm-4" id="numrows"></div>
                                           </div>


                                    <script type="text/javascript">
                                       

                                            function numrows()
                                            { 

                                               var qpid=document.getElementById('qpid').value;
                                              


                                         
                                              
                                             
                                              
                                             
                                              var viewxml = new XMLHttpRequest();
                                               viewxml.onreadystatechange = function()
                                                {
                                                     if (this.readyState == 4 && this.status == 200)
                                                      {   
                                                         // for(var nu=1;nu<=num;nu++)
                                                         // {
                                                          document.getElementById("numrows").innerHTML = this.responseText;
                                                          // }
                                                    }
                                               };

                                                        viewxml.open("GET" , "numrows.php?qpid=" + qpid  , true);
                                                        viewxml.send();
                                                                                                 
                                            }
                                          </script>
                                          
                                          


                                        <script type="text/javascript">
                                          function entry() 
                                          {

                                                var regno=document.getElementById('regno').value;
                                                
                                                var subbb=document.getElementById('subbb').value;
                                                
                                                var qpid=document.getElementById('qpid').value;


                                                var inputs=document.getElementsByName("mark");
                                                var mark="";
                                                
                                                for (var j=0;j<inputs.length;j++) {
                                                mark=inputs[j].value;
                                        
                                                
                                                 var viewxml = new XMLHttpRequest();
                                               viewxml.onreadystatechange = function()
                                                {    
                                                     if (this.readyState == 4 && this.status == 200)
                                                      {   
                                                         // for(var nu=1;nu<=num;nu++)
                                                         // {
                                                           var al=this.responseText;
                                                         alert(al);
                                                          // }
                                                    }
                                                    
                                               };

                                                        viewxml.open("GET" , "entry.php?qno=" + j +"&mark=" + mark + "&regno=" + regno + "&subbb=" + subbb + "&qpid=" + qpid  , true);
                                                        viewxml.send();

                                                }
                                            
                                                 
                                                 
                                                 document.getElementById('regno').value='';    
                                                 var inputs=document.getElementsByName("mark");
                                                
                                                for (var j=0;j<inputs.length;j++)
                                                {
                                                   inputs[j].value='';
                                               }   
                                             }

                                          
                                        </script>
                                        <br> 
                                    </div>
                                </div>

                                <!-- mark entering form -->
    

                   
                   


              </form>
        </div>
        <!-- BOX BODY -->
      
      </div>

      <!-- BOX -->
    </section>
    <!-- CONTENT HEADER -->
    
 </div>
 <!-- CONTENT WRAPPER -->
 <?php 
      include('footer.php');
    ?>

                  <?php 



                     if (isset($_POST['entermark'])) 
                     {
                       
                     
                           $subjectcode=$_POST['subjectcode']; 
                                             
                           $qpid=$_POST['qpid'];
   
                           $regno=$_POST['regno'];

                           $qno=$_POST['qno'];
                       
                           $actualmark=$_POST['actualmark'];
              
                           $inquery="INSERT into marks values ('$regno','$subjectcode','$qpid','$qno','$actualmark')";

                          if (mysqli_query($con,$inquery)) 
                          {
                            echo "<script>window.alert('MARK HAS ADDED');</script>";
                          }
                         else
                          {
                             echo "<script>window.alert('MARK NOT ADDED...! TRY AGAIN');</script>";
                          }

                     }



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
