<?php


require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('connection.php');


if(isset($_POST['Submit'])){


  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
      // move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    echo "You have total ".$totalSheet." sheets".


    $html="<table border='1'>";
    $html.="<tr><th>regno</th><th>name</th><th>department</th><th>admnno</th><th>batch</th><th>semester</th></tr>";


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);


      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $regno = isset($Row[0]) ? $Row[0] : '';
        $name = isset($Row[1]) ? $Row[1] : '';
        $department = isset($Row[2]) ? $Row[2] : '';
        $admnno = isset($Row[3]) ? $Row[3] : '';
        $batch = isset($Row[4]) ? $Row[4] : '';
        $semester = isset($Row[5]) ? $Row[5] : '';

        $html.="<td>".$regno."</td>";
        $html.="<td>".$name."</td>";
        $html.="<td>".$department."</td>";
        $html.="<td>".$admnno."</td>";
        $html.="<td>".$batch."</td>";
        $html.="<td>".$semester."</td>";



        $html.="</tr>";


        $query = "INSERT into student_details values('".$regno."','".$name."','".$department."','".$admnno."','".$batch."','".$semester."')";


        mysqli_query($con,$query);
       }


    }


    $html.="</table>";
    echo $html;
    echo "<script>window.location.href='addstudent.php'</script>";


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }


}


?>