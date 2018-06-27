<?php
  session_start();


  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $target_file1 =$target_dir . basename($_FILES["fileToUpload1"]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    //echo "File is valid, and was successfully uploaded";
    header('Location: index2.php');
    $_SESSION['filePath'] = $target_file;
    $_SESSION['fileName'] = basename($_FILES["fileToUpload"]["name"]);
    echo $_SESSION['fileName'];
  }
  else {
    echo "<script>alert('Sorry, there was an error importing your file.')</script>";
    header('Location: index2.php');
    $_SESSION['fileName'] = "failed";
  }

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    //echo "File is valid, and was successfully uploaded";
    header('Location: index2.php');
    $_SESSION['filePath1'] = $target_file1;
    $_SESSION['fileName1'] = basename($_FILES["fileToUpload1"]["name"]);
    echo $_SESSION['fileName1'];
  }
  else {
    echo "<script>alert('Sorry, there was an error importing your file.')</script>";
    header('Location: index2.php');
    $_SESSION['fileName1'] = "failed";
  }
?>
