<?php
  session_start();
  //include 'readln.php';
  include_once 'compare.php';
  include_once 'main.php';

  $file1= $_SESSION['fileName'];
  $file2= $_SESSION['fileName1'];
  // $file1="data.log";
  // $file2="data1.log";

  $result= main_file($file1,$file2);
 $finalResult = $result[0];
 $finalResult1 =$result[1];
 // echo $finalResult;
 // // echo $finalResult;
 // echo $finalResult1;
  if ($result !== "") {  
    $_SESSION['result'] = $finalResult;
    $_SESSION['result1']=$finalResult1;
    // $_SESSION['ipSearch'] = $ipSearch;
  }
  else {
    $_SESSION['result'] = "Error in comparing!";
    // $_SESSION['ipSearch'] = $ipSearch;
  }
  header('Location: index2.php');
    // unlink($file1);
    // unlink($file2);
?>


