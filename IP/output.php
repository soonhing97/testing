<?php
  session_start();
  include 'readIn.php';

  $filePath = $_SESSION['filePath'];
  $ipSearch = $_POST['ipSearch'];

  $result = trim(readIn($filePath, $ipSearch), " ");
  if ($result != "") {
    $_SESSION['result'] = $result;
    $_SESSION['ipSearch'] = $ipSearch;
  }
  else {
    $_SESSION['result'] = "Not Found";
    $_SESSION['ipSearch'] = $ipSearch;
  }
  header('Location: index2.php');
?>
