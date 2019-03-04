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
              <h3 class="box-title"></h3>
               <button type="submit"  style=" margin-left: 10px" id="newbttuon" class="btn btn-info pull-right" onclick="printform()">New</button>
                <script type="text/javascript">
                  function printform(argument) {
                      document.getElementById('printform').style.display='block';
                      document.getElementById('listform').style.display='none';
                       document.getElementById('newbttuon').style.display='none';

                  }
               

                
                   


                          function editqp(argument) {
                             document.getElementById('printform').style.display='block';
                      document.getElementById('listform').style.display='none';
                       document.getElementById('newbttuon').style.display='none';
                       alert("working");
                          }
     </script>
  
     </div>
         
            <!-- /.box-header -->
            <div class="box-body">
             
             <div id="listform">
               <center> <h3>Question papers</h3></center>
               
                <div class="col-sm-12">
                  <ol ">
                  <?php
                   $query="SELECT  DISTINCT qpid from question"; 
                   $result=mysqli_query($con,$query);
                   while ($rows=mysqli_fetch_assoc($result)):;
                     ?>

                     <li><b><?php echo $rows['qpid']; ?></b></li>
                
                    
                      <?php $qp=$rows['qpid'];?>
                     <button class="btn btn-warning" id="update" value="<?php echo $rows['qpid']; ?>" onclick="edit(this.value)"><i class="fa fa-tv"></i></button>


                     <button class="btn btn-danger" value="<?php echo $rows['qpid']; ?>" onclick="deleteqp(this.value)"><i class="fa fa-trash"></i></button>
                     <button class="btn btn-success"><i class="fa fa-print"></i></button> 
              
                   <?php endwhile;?> 

 
                </ol>
              </div>
            </div>
           
            <div id="viewxm" style="border:2px solid black; display: none;">
              <button class="btn fa fa-close" style="width: 120px; margin: 10px" onclick="clos()">Close</button>
             <div id="viewxml" >view here</div>
             
             <center>
             
             <button class="btn btn-danger" style="width: 120px" onclick="deleteqp(0)">Delete</button>
             <button class="btn btn-success" style="margin-left: 50px; width: 120px;" onclick="">Print</button>
             </center>
        
            </div>
            <script type="text/javascript">



                  function deleteqp(arg)
                  {
                    var ok=confirm('This Will Be Deleted..!!');
                    if(ok==true)
                    {
                         if(arg=='0'){
                          var id=document.getElementById('spanid').value;}
                          else
                          {
                            var id=arg;
                          }
                          var viewxml = new XMLHttpRequest();
                  viewxml.onreadystatechange = function()
            {
              if (this.readyState == 4 && this.status == 200)
              {
                        alert( this.responseText);

              }
            };

            viewxml.open("GET" , "updating.php?id=" + id, true);
            viewxml.send();

                    }
   location.reload();
                  }










              function clos(argument) {
                document.getElementById('viewxm').style.display='none';
                document.getElementById('listform').style.display='block';
              }

              function edit(id) {
                document.getElementById('viewxm').style.display='block';
                document.getElementById('listform').style.display='none';
                 var series=document.getElementById('series').value;
                var viewxml = new XMLHttpRequest();
                  viewxml.onreadystatechange = function()
            {
              if (this.readyState == 4 && this.status == 200)
              {
                        document.getElementById("viewxml").innerHTML = this.responseText;

              }
            };

            viewxml.open("GET" , "updatequ.php?id=" + id+"&series="+series, true);
            viewxml.send();
              }




            </script>
              

              <div id="printform" style="display: none;">
              <form action="question.php" method="post" id="mainform">
               
                <div class="box-body">
                  <div id="formhead">
                    <center><h3>Question Paper Details</h3></center>
                    <div class="col-sm-4" style="margin-top: 20px">
                    <div class="col-sm-12">
                      <script type="text/javascript">                      function test()
        {
          var xmhtt = new XMLHttpRequest();
            xmhtt.onreadystatechange = function()
            {
              if (this.readyState == 4 && this.status == 200)
              {
                        document.getElementById("outcome").innerHTML = this.responseText;

              }
        //      else
        //      {
        // document.getElementById("txtHint").innerHTML = 'error';
        //      }
            };
            var subcode=document.getElementById("subbb").value;
            
            xmhtt.open("GET" , "add.php?q=" + subcode, true);
            xmhtt.send();
        }

                     </script>
                     <label for="subbb">Subject Code</label>
 <select class="form-control " name="subjectcode" id="subbb" onchange="test()" >
                        <option value="subjectcode"  id="sub" selected="selected">Subject Code</option>
                       <!-- subjects as the options -->
                       <?php 
                           $f_id=$_SESSION['f_id'];
                          $subquery="SELECT sub_code  FROM subject_details where f_id='$f_id'";
                             $result=mysqli_query($con,$subquery);

                             while ($roww=mysqli_fetch_assoc($result)):;
                             ?>
                          <option value="<?php echo $roww['sub_code'];?>"><?php echo $roww['sub_code'];?></option>
                        <?php endwhile;?>
                        </select>
                    </div>
                  </div>
    

  





                
                    <div class="col-sm-6" style="margin-top: 20px">
                      <div class="" style="width: 50%">
                        <label for="series">Series</label>
                      <select id="series" class="
                      form-control ">
                        <option value="SERIES" selected="selected">Series</option>
                        <option value="SE01">SERIES 1</option>
                        <option value="SE02">SERIES 2</option>
                        <option value="SE03">SERIES 3</option>
                      </select>
                      
                      </div>
                    
                       
                 </div>
              
                    <div class="col-sm-4">
                    <div class="col-sm-12" style="margin-top: 20px">
                      <label for="outcome">Outcome</label>
                      <select class="form-control" name="outcome" id="outcome">
                        <option value="outcome"  id="" selected="selected">Outcome</option>
                       
                        </select>
                    </div>
                  </div>
                     <div class="col-sm-3" style="margin-top: 20px;">
                                                  <label style=" " for="qpid" name="gen" class=" label btn-danger btn-pull-left">QPID</label>

                        <input type="text" readonly="readonly" style="margin-left: 0px;color: black; " class="form-control btn btn-danger" name="qpid" id="qpid"  >
                        <style type="text/css">
                          #qpid:hover{
                              background: gainsboro;
                          }
                        </style>
                      </div>
                 
            </div>

                  <form>
                     
                    
              
               
<div
            
                    <div class="form-group" id="questions">
                      <br>
                      <div class="col-sm-12">
                        <div class="col-sm-2" style="margin-top: 20px">
                          <label for="qno" >Question Number</label>
                        <input type="text" class="form-control" name="qno" id="qno" placeholder="Qno" >
                      </div>
                      
                     <div class="col-sm-7" style="margin-top:20px">
                      <label for="question" >Enter the Question</label>
                        <input type="text" class="form-control" name="question" id="question" placeholder="Question" >
                      </div>
                     
                      <div class="col-sm-2" style="margin-top:20px">
                        <label for="mark">Mark</label>
                        <input type="text" class="form-control" name="questionm" id="mark" placeholder="mark" >
                      </div>
                    </div>
                    
                   
                                         <!-- button to add subquestion -->
                    <div class="col-sm-12">
                      <div class="col-sm-4">
                       <input type="button" style="margin-top:10px; width: 120px" name="cancel" value="Close" class="btn  btn-danger" onclick="can()">
                       <script type="text/javascript">
                         function can() {
                        
                          location.reload('true');
                         }
                       </script>
                     </div>
                     <div class="col-sm-4">
                        <input type="button" style="margin-top:10px;width:120px" name="submit" class="btn btn-success pull-right" value="SAVE" onclick="saving()">
                        <script type="text/javascript">
                          function saving() 
                          {
                            var subcode=document.getElementById('subbb').value;
                            var series=document.getElementById('series').value;
                            document.getElementById('qpid').value=subcode+series;
                            var outcome=document.getElementById('outcome').value;
                            var qpid=document.getElementById('qpid').value;
                            var qno=document.getElementById('qno').value;
                            var question=document.getElementById('question').value;
                            var mark=document.getElementById('mark').value;
                             var xmhttp = new XMLHttpRequest();
                             xmhttp.onreadystatechange = function()
                            {
                             if (this.readyState == 4 && this.status == 200)
                                 {
                                           document.getElementById("added").innerHTML = this.responseText;

                                     }
      
                                 };
                           
            
                            xmhttp.open("GET" , "insert.php?subcode=" +subcode+"&series=" + series+"&outcome="+outcome+"&qpid="+qpid+"&qno="+qno+"&question="+question+"&mark="+mark, true);
                          xmhttp.send();


                          document.getElementById('qno').value='';
                          document.getElementById('question').value='';
                          document.getElementById('mark').value='';
                          document.getElementById('added').style.display='block';

                          }
                        </script>
                      </div>
                    </div>

</div>
</div>

 <div id="added" style="border-top: 2px solid black; display: none;">
              
            </div></form>
          </div></div></div>
  
                      
                       <div class="form-group" id="foot">
                   
                       </div>
                      
                     </div>


                     </form>
                     </div>
                  
                   </div>

                 </div>

                  

                  </div>                  
                
                <!-- adding questions to database -->
                   <?php 
                        
// auto generating qpid
                  
                     


                      // declaring variables for input
                     
                          
                       // query to add to database
                       

                       
                  
                // <!-- adding has done -->

                   // printing the question paper

                 
                ?>
                  

                </div>
              </div>
            </form> 
            </div>

            </div>
            
            <!-- /.box-body -->
  
</div>


          </div>
       

 
        </div>
   

        
      </div>
     

    </section>
  
  </div>


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
