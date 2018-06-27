<?php
  include 'range.php';
  include 'find.php';

  function readIn($filePath, $ipSearch) {
    //pass in filename
    $myfile = fopen($filePath,"r") or die("Unable to open file!");
    $strResult = "";

    while(!feof($myfile)){

      $flagVPN = false;
      $line = fgets($myfile);

      if (strpos($line,'dis ip routing-table') !==false){
        //get the name of VPN
        if (strpos($line,'vpn-instance') !== false){
          $pos = strpos($line,"vpn-instance");
          $pre = $pos + 13;
          $VPN = substr($line, $pre ,strlen($line)- $pre);
        }else {

          $VPN = 'Public';
        }

        //echo $VPN;

        //skip 7 lines to reach the first record
        for ($i = 0; $i <=6; $i++){
          $temp = fgets($myfile);
        }

        $endSectionFlag = false;

        while($endSectionFlag == false){
          $line = fgets($myfile);
          //echo($line);

          if($line[0] == '<'){
            $endSectionFlag = true;
            //echo("end");
          }else{
            $endSectionFlag = false;
            //start extracting IP
            $record = substr($line,0,18);
            //echo "\n";
            //$record = str_replace(' ','',$record);
            $record = preg_replace('/\s+/', '', $record);

            if($record == ''){
              //echo "";
            }else {
              //IP address
              $getRange = getSubnet($record);
               if(findIP($ipSearch, $record, $getRange)){
                 $strResult =  $strResult."<br>".$record." - Found";
                 //echo $record;
                 //echo " - Found";
                 $flagVPN = true;
               }
            }
          }
        }
        }
        //Tell the user IP exist in which vpn
        if ($flagVPN){
          $strResult =  $strResult."<br>"."IP落入范围中有关的VPN: ".$VPN."<br>";
        }
    }
    //echo gettype($strResult);
    fclose($myfile);
    return $strResult;
  }

?>
