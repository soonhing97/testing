<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css">
    <title>VPN Finder</title>
    <style>
      .card {
          /* Add shadows to create the "card" effect */
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          border:2px solid black;
      }
      /* Add some padding inside the card container */
      .container {
          padding: 2px 16px;
      }
      input[type=file]{
        border:2px solid black;
        border-radius: 4px;
        width:720px;
      }

    </style>
  </head>
  <body>

      </script>
    <div class='container'>
        <div class='row'>
            <div class='offset-sm-2 card col-sm-8' style='margin-top: 10%;'>
              <div style='text-align: center; margin-top: 2em; margin-bottom: 2em;'>
                <img src='img/vpn1.png' height='150' width='150' style='margin-bottom: 2em;'>
                <h1>VPN Quick Compare Tool</h1>
            </div>

            <h5>1. Insert your first file (original file):</h5>
            <!-- form to import text file-->
            <form action='import.php' method='post' enctype="multipart/form-data">
              <div class='row'>
                <div class='col-sm-10' style='padding-left:1em; width:100%;'>
                    <input class='form-control' type='file' name='fileToUpload' accept='.log' id='fileToUpload' required>
                    <?php
                      if (isset($_SESSION['fileName']) && $_SESSION['fileName']!="failed") {
                        echo "<div style='text-align: center;' class=''>" .
                        $_SESSION['fileName'] . " has been imported.</div>";
                      }
                    ?>
                    <h5>2. Insert your second file (File to be checked):</h5>
                    <input class='form-control' type='file' name='fileToUpload1' accept='.log' id='fileToUpload1' required>
                    <?php
                      if (isset($_SESSION['fileName1']) && $_SESSION['fileName1']!="failed") {
                        echo "<div style='text-align: center;' class=''>" .
                        $_SESSION['fileName1'] . " has been imported.</div>";
                      }
                    ?>
                  <div class='col-sm-2' style='padding-left:17.7em;'>
                  <button style='width:10em; margin-top: 1em;text-align: center;'type='submit' class="btn btn-primary btn-block">Import</button>
                </div>
                </div>
                <!-- <div class='col-sm-2' style='padding-left:0'>
                  <button type='submit' class="btn btn-primary btn-block">Import</button>
                </div> -->
              </div>
            </form><br>
              <form action='output.php' method='post'>
                <div style='text-align: center;'>
                <button style='width:10em; margin-top: 1em;' class='btn btn-primary' type='submit' >Click to compare</button>
              </div>
              <div class='row'>
              <div class='offset-sm-1 col-sm-10 card'
              style='margin-top:2em; box-shadow: 0 0 0 0 rgba(0,0,0,0); text-align: center; padding: 2em 0 2em 0;'>
                <?php
                  if (isset($_SESSION['result'])) {
                    echo "<h2>" . "Result:". "</h2>";
                    echo "<h3>" . $_SESSION['result'] . "</h3>";
                    unset($_SESSION['result']);
                  }
                    if (isset($_SESSION['result1'])) {
                    echo "<h6>" . $_SESSION['result1'] . "</h6>";
                    unset($_SESSION['result1']);
                  }
                ?>
            </form><br><br>
            
              </div>
            </div>
               
<!--                // if (isset($_SESSION['result'])) {
               //      echo "<h3>" . $_SESSION['result'] . "</h3>";
               //      unset($_SESSION['result']); -->
              
                <!-- //  if (isset($_SESSION['ipSearch'])) {
                //    echo "<input class='form-control input-lg' type='text' id='input' name='ipSearch'
                //   pattern='^([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})$' size='60'
                //    title='XXX.XXX.XXX.XXX' placeholder='Please enter an IP address to search' value='" .
                //     $_SESSION['ipSearch'] . "' required>";
                //     unset($_SESSION['ipSearch']);
                //  }
                //  else {
                //    echo "<input class='form-control input-lg' type='text' name='ipSearch'
                //    pattern='^([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})$' size='60'
                //    placeholder='Please enter an IP address to search' title='XXX.XXX.XXX.XXX' required>";
                // } -->
              
              <!-- <div style='text-align: center;'>
                <button style='width:8em; margin-top: 1em;' class='btn btn-primary' type='submit' >Submit</button>
              </div> --> 
            </form><br><br>
            <!-- <div class='row'>
              <div class='offset-sm-1 col-sm-10 card'
              style='margin-bottom:2em; box-shadow: 0 0 0 0 rgba(0,0,0,0); text-align: center; padding: 2em 0 2em 0;'> -->
                <?php
                  // if (isset($_SESSION['result'])) {
                  //   echo "<h3>" . $_SESSION['result'] . "</h3>";
                  //   unset($_SESSION['result']);
                  // }
                ?>
              </div>
            </div>

        </div>
    <form action='import.php' method='post' enctype="multipart/form-data">
    <form action='import2.php' method='post' enctype="multipart/form-data">

    </form>
  </body>
</html>
