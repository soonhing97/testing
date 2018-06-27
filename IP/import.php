<?php
  session_start();


  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    header('Location: index2.php');
    $_SESSION['filePath'] = $target_file;
    $_SESSION['fileName'] = basename($_FILES["fileToUpload"]["name"]);
    echo $_SESSION['fileName'];
  }
  else {
    echo "<script>alert('Sorry, there was an error importing your file.')</script>";
    header('Location: index.php');
    $_SESSION['fileName'] = "failed";
  }
?>
