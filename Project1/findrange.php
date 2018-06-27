<?php

function findIP ($ipIn, $ipStart, $range) {

//extract ip from ip/subnetmask

 $ipStart = substr($ipStart, 0 , strlen($ipStart) -3);

 $ipIn = explode(".", $ipIn);

 $ipStart = explode(".",$ipStart);

 //***************case subnet 8****************
 //comparison between first part of IPin and IPStart
if ($range == 16777216){
  if($ipStart[0] == $ipIn[0]){
     //convert decimal to binary and then concatenant
    $in1bin = decbin($ipIn[1]);
    $in2bin = decbin($ipIn[2]);
    $in3bin = decbin($ipIn[3]);

    $inbin = $in1bin.$in2bin.$in3bin;

    //convert back to decimal
    //$indec = bindec($inbin);

    //check range
    if ($inbin <= $range && $inbin >= 0){
      return true;
    }else{
      return false;
    }
  }
}
 //***************case subnet 16****************
 //comparison between first & second part of IPin and IPStart
 if ($range == 65535){
   if ($ipStart[0] == $ipIn[0] && $ipStart[1] == $ipIn[1]){
     //convert decimal to binary and then concatenante
     $in2bin = decbin($ipIn[2]);
     $in3bin = decbin($ipIn[3]);

     $inbin = $in2bin.$in3bin;

     //convert back to decimal
     $indec = bindec($inbin);

     //check range
     if ($indec <= $range && $indec >= 0){
       return true;
     }else{
       return false;
     }
   }
 }
  //***************case subnet 24 and above****************
  //comparison between first & second & third part of IPin and IPStart
  // if ($ipStart[0] == $ipIn[0] && $ipStart[1] == $ipIn[1] && $ipStart[2] == $ipIn[2]){
    //$last = getEachIpInRange($ipStart);
  if ($range=4){
    $ip1=$ipStart[0]*2**24+$ipStart[1]*2**16+$ipStart[2]*2**8+$ipStart[3];
    $ip2=$ipIn[0]*2**24+$ipIn[1]*2**16+$ipIn[2]*2**8+$ipIn[3];

    echo $ip1^$ip2;
    echo "\n";

    // if ($ipIn[3] <= $last && $ipIn[3] >= $ipStart[3]) {
    if(($ip1|$ip2)<=$range){
      return true;
      }
    else {
      return false;
    }
  }
}
?>