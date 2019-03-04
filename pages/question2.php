
<?php 
 session_start();
 $con=mysqli_connect("localhost","root","");
 mysqli_select_db($con,"obsms");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Question Paper</title>
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
              <h3 class="box-title">Prepare your question paper</h3>
               <button type="submit" class="btn btn-info pull-right" style=" margin-left: 10px" onclick="add()">Print</button>
               <button type="submit" class="btn btn-info pull-right">Save and Print</button>
                <script type="text/javascript">
                  function add() 
                   {
                     var $from='#printqpaper';
                       document.getElementById('adding').innerHTML=$from;
            }
          
          
            var subval=0;
            var test="newinput1";
    function adding(id)
     {  
     
      
      var input=document.createElement("input");
      input.setAttribute("type","text");
      if (test==id)
      {
        subval++
      }
      else
      {
       test=id;
       subval=1;
      }
      
      
      input.setAttribute("placeholder",id+subval);
      input.setAttribute("name",id+subval);
      input.setAttribute("id",id+subval)
      input.setAttribute("class","col-sm-9");
      input.setAttribute("style","margin-top:10px");
       var newi=document.getElementById(id);
       newi.appendChild(input); 


      var mark=document.createElement("input");
      mark.setAttribute("type","text");
      mark.setAttribute("placeholder",id+"m"+subval);
      mark.setAttribute("name","mar");
      mark.setAttribute("class","col-sm-12");
      mark.setAttribute("style","margin-top:10px");
      var m='m';
      var idd=id+m;
       var newm=document.getElementById(idd);
       newm.appendChild(mark);

    }

         var ano='<p id="questi">hello</p>';
        
         var count=1;
         var newid=1;
          var nextinput=2; 
     function quest()
     {count++;
                      
                        var c=`<div class="form-group" ><div class="col-sm-10" ><input type="text" class="form-control" name="question" id="inputPassword3" placeholder="Question${nextinput}" style="margin-top:10px"></div><div class="col-sm-2"><input type="text" class="form-control" name="question" id="inputPassword3" placeholder="mark" style="margin-top:10px"></div><div class="col-sm-6"><span id="newinput${nextinput}">boyz</span></div><div class="col-sm-2" ><span id="newinput${nextinput}m" ></span></div><input type="button" style="margin-top:10px" name="add" value="Add Sub question" class="btn btn-info pull-left" onclick="adding('newinput${nextinput}')"></div><p id="another${nextinput}"></p>`;
                        var id='another'+newid;
                        document.getElementById(id).innerHTML=c;
                       
                        newid++;
                        nextinput++;
      }
   
     </script>
     </div>
         <div  id="adding" class="adding-form">
          <form id="add">

          </form>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="question2.php" method="post">
               
                <div class="box-body">
                  <div class="form-group">
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="subcode" id="inputEmail3" placeholder="Subject code">
                    </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="qpid" id="inputEmail3" placeholder="Q-Paper ID">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="question" id="inputPassword3" placeholder="Question1" style="margin-top:10px">
                      </div>
                     
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="question" id="inputPassword3" placeholder="mark" style="margin-top:10px">
                      </div>
                    </div>
                    <div class="form-group" style="margin-top:10px">
                      <div class="col-sm-6" >
                            <span id="newinput1"></span>
                      </div>
                      <div class="col-sm-2" >
                            <span id="newinput1m"></span>
                       </div>
                       <input type="button" style="margin-top:10px" name="add" value="Add Sub question" class="btn btn-info pull-left" onclick="adding('newinput1')">
                     </div>
                     <div>
                    <p id="another1">
                      
                    </p>
                    </div>
                   </div>


                

                    
                    </form>
                  <div class="box-footer">
                    <button type="submit" name="cancel" class="btn btn-default" onclick="cancel()">Cancel</button>
                    <input type="button" name="ques" class="btn btn-pull-right" value="Add Question" onclick="quest()">
                  

                    <script type="text/javascript">
                    
                    </script>
                    
                  </div>
                </div>
              </div>
            </form> 
            </div>
            </div>
            <!-- /.box-body -->

             <?php
   include("footer.php");
   ?>
          </div>
           
          <!-- /.box -->
        </div>

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
  <!-- /.content-wrapper -->


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
