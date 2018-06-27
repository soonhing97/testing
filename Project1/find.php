<?php

include_once 'compareNew.php';


//function to calculate whether IP falls in the range
function findIP ($ipIn, $ipStart, $range) {

//extract ip from ip/subnetmask
 //$ipStart = substr($ipStart, 0 , strlen($ipStart) -3);

 $ipIn = explode(".", $ipIn);

// $ipStart = getIpInRange($ipStart);
 $ipStart1 = explode("/",$ipStart);
 $ipStart2 = explode(".",$ipStart1[0]);

 $ipStarter = getIpRange($ipStart);
 $newipStarter = $ipStarter['firstIP'];
 $newipStarter1 = $ipStarter['lastIP'];
 // echo $newipStarter;
 // echo "\n";
 // echo $newipStarter1;

$in1bin = long2ip($ipStarter['firstIP']);
$in2bin = long2ip($ipStarter['lastIP']);

//$inbin = $in1bin.$in2bin;
// echo "\n";
$binary_start = explode(".",$in1bin);
 //echo $binary_start[3];
// echo "\n";
$binary_end = explode(".",$in2bin);
// echo $binary_end[3];
// echo "\n";

if($range == 16777216){
  if($ipStart2[0] == $ipIn[0]){
    return true;
  }
}elseif($range == 65535){
  if($ipStart2[0] == $ipIn[0] && $ipStart2[1] == $ipIn[1]){
    return true;
  }
}else{
  if ($ipStart2[0] == $ipIn[0] && $ipStart2[1] == $ipIn[1] && $ipStart2[2] == $ipIn[2]){
    if($ipIn[3]<=$binary_end[3] && $ipIn[3]>=$binary_start[3]){
    return true;
    }else{
    return false;
    }
  }
}

}
?>
