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
    <title>IP Finder</title>
    <style>
      .card {
          /* Add shadows to create the "card" effect */
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      }
      /* Add some padding inside the card container */
      .container {
          padding: 2px 16px;
      }
    </style>
  </head>
  <body>
    <div class='container'>
        <div class='row'>
            <div class='offset-sm-2 card col-sm-8' style='margin-top: 10%;'>
              <div style='text-align: center; margin-top: 2em; margin-bottom: 2em;'>
                <img src='img/ip.png' height='110' width='110' style='margin-bottom: 2em;'>
                <h1>VPN Comparison</h1>
            </div>
            <h5>1. Insert your files:</h5>
            <!-- form to import text file-->
            <form action='import.php' method='post' enctype="multipart/form-data">
              <div class='row'>
                <div class='col-sm-10' style='padding-right:1em;'>
                    <input class='form-control' type='file' name='fileToUpload' accept='.log' id='fileToUpload' required>
                    <?php
                      if (isset($_SESSION['fileName']) && $_SESSION['fileName']!="failed") {
                        echo "<div style='text-align: center;' class=''>" .
                        $_SESSION['fileName'] . " has been imported.</div>";
                      }
                    ?>
                    <input class='form-control' type='file' name='fileToUpload' accept='.log' id='fileToUpload' required>
                    <?php
                      if (isset($_SESSION['fileName']) && $_SESSION['fileName']!="failed") {
                        echo "<div style='text-align: center;' class=''>" .
                        $_SESSION['fileName'] . " has been imported.</div>";
                      }
                    ?>
                </div>
                <div class='col-sm-2' style='padding-left:0'>
                  <button type='Click to compare' class="btn btn-primary btn-block">Import</button>
                </div>
              </div>
            </form><br>

            
            
              <div style='text-align: center;'>
                <button style='width:10em; margin-top: 1em;' class='btn btn-primary' type='Click to compare' >Click to compare</button>
              </div>
            </form><br><br>
            <div class='row'>
              <div class='offset-sm-1 col-sm-10 card'
              style='margin-bottom:2em; box-shadow: 0 0 0 0 rgba(0,0,0,0); text-align: center; padding: 2em 0 2em 0;'>
                <?php
                  if (isset($_SESSION['result'])) {
                    echo "<h3>" . $_SESSION['result'] . "</h3>";
                    unset($_SESSION['result']);
                  }
                ?>
              </div>
            </div>

        </div>
    </div>
    <form action='import.php' method='post' enctype="multipart/form-data">

    </form>
  </body>
</html>
