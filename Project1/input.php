<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>IP Finder</title>
    <style>
      form {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
      }
    </style>
  </head>
  <body>
    <form action='output.php' method='post'>
      <div style='text-align: center;'>
        <a href="index2.php">
          <img src='img/ip.png' height='150' width='150' style='margin-bottom: 2em;'><br>
        </a>
        <?php
         if (isset($_SESSION['ipSearch'])) {
           echo "<input class='form-control input-lg' type='text' id='input' name='ipSearch'
           pattern='^([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})$' size='60'
           title='XXX.XXX.XXX.XXX' placeholder='Please enter an IP address to search' value='" .
            $_SESSION['ipSearch'] . "' required>";
            unset($_SESSION['ipSearch']);
         }
         else {
           echo "<input class='form-control input-lg' type='text' name='ipSearch'
           pattern='^([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})+\.([0-9]{1,3})$' size='60'
           placeholder='Please enter an IP address to search' title='XXX.XXX.XXX.XXX' required>";
         }

          if (isset($_SESSION['result'])) {
            echo "<p style='margin:0;' id='result'>" . $_SESSION['result'] . "<p>";
            unset($_SESSION['result']);
          }
        ?>
        <button style='margin-left: 1em; width:8em; margin-top: 1em;' class='btn' type='reset' onclick="resetInput()">Clear</button>
        <button style='margin-left: 0.5em; width:8em; margin-top: 1em;' class='btn' type='submit' >Search</button>
      </div>
    </form>
    <script>
      function resetInput() {
        document.getElementById('input').setAttribute('value', '');
        document.getElementById('result').innerHTML = "";
      }
    </script>
  </body>
</html>
