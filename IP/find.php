<?php

include_once 'compareNew.php';
// $ipIn=array("192.168.0.10/30","10.38.0.14/28","10.34.0.8/32","10.38.1.72/30");
// $ipStart=array("192.168.0.10/32","10.38.0.14/28","10.34.0.8/30","10.38.1.72/30");

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






 // echo $ipStarter['firstIP']- $ipStarter['lastIP'];

// if ($binary_start[0] == $ipIn[0] && $binary_start[1] == $ipIn[1] && $binary_start[2] == $ipIn[2]){
//     if($ipIn[3] <=$range && $ipIn[3]>=$binary_start[3]){
//     return true;
//     }else{
//     return false;
//     }
//   }

//  $in1bin = decbin($ipStart[0]);
//  $in2bin = decbin($ipStart[1]);
//  $in3bin = decbin($ipStart[2]);
//  $in4bin = decbin($ipStart[3]);

//  $inbin = $in1bin.$in2bin.$in3bin.$in4bin;
// echo $inbin;
// echo "\n";
//  $strRange ="";

//  for($i=0;$i<32;$i++){
//   if($i<30){
//     $strRange = $strRange."1";
//   }else{
//     $strRange = $strRange."0";
//   }
//  }

 //***************case subnet 8****************
 //comparison between first part of IPin and IPStart
// if ($range == 16777216){
//   if($ipStart[0] == $ipIn[0]){
//      //convert decimal to binary and then concatenant
//     $in1bin = decbin($ipIn[1]);
//     $in2bin = decbin($ipIn[2]);
//     $in3bin = decbin($ipIn[3]);

//     $inbin = $in1bin.$in2bin.$in3bin;

//     //convert back to decimal
//     $indec = bindec($inbin);

//     //check range
//     if ($indec <= $range && $indec >= 0){
//       return true;
//     }else{
//       return false;
//     }
//   }
// }
//  //***************case subnet 16****************
//  //comparison between first & second part of IPin and IPStart
//  if ($range == 65535){
//    if ($ipStart[0] == $ipIn[0] && $ipStart[1] == $ipIn[1]){
//      //convert decimal to binary and then concatenante
//      $in2bin = decbin($ipIn[2]);
//      $in3bin = decbin($ipIn[3]);

//      $inbin = $in2bin.$in3bin;

//      //convert back to decimal
//      $indec = bindec($inbin);
//      //echo $indec;

//      //check range
//      if ($indec <= $range && $indec >= 0){
//        return true;
//      }else{
//        return false; 
//      }
//    }
//  }
//   //***************case subnet 24 and above****************
//   //comparison between first & second & third part of IPin and IPStart
//  // if ($range==256 || $range ==64 || $range==32 || $range ==16 ||$range==8 ||$range==4 ||$range==2 ||$range==1){
//  //    if ($ipStart[0] == $ipIn[0] && $ipStart[1] == $ipIn[1] && $ipStart[2] == $ipIn[2]){
//  //    $in3bin= decbin($ipIn[3]);
//  //    $indec = bindec($inbin);
//     //$last = $ipStart[3]+$range -1;
//     $ip1=$ipStart[0]*2**24+$ipStart[1]*2**16+$ipStart[2]*2**8+$ipStart[3];
//     $ip2=$ipIn[0]*2**24+$ipIn[1]*2**16+$ipIn[2]*2**8+$ipIn[3];

//     // echo $ip1^$ip2;
//     // echo "\n";

//     //if ($ipIn[3] <= $last && $ipIn[3] >= $ipStart[3]) {
//     if($ip1^$ip2 < $range){
//       return true;
//     }else{
    //   return false;
    // }
    // //}
  //}
//}
}
?>
