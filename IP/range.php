<?php
  //function to find the range for the given subnet mask
  function getSubnet($ip) {
    $subnet = substr($ip, strpos($ip, '/') + 1);
    //echo 'subnet = ' . $subnet;
    $range = 0;
    if ($subnet == 0) {
      $range = 4294967296;
    }
    else if ($subnet == 8) {
      $range = 16777216;
    }
    else if ($subnet == 16) {
      $range = 65535;
    }
    else if ($subnet == 24) {
      $range = 256;
    }
    else if ($subnet == 25) {
      $range = 128;
    }
    else if ($subnet == 26) {
      $range = 64;
    }
    else if ($subnet == 27) {
      $range = 32;
    }
    else if ($subnet == 28) {
      $range = 16;
    }
    else if ($subnet == 29) {
      $range = 8;
    }
    else if ($subnet == 30) {
      $range = 4;
    }
    else if ($subnet == 31) {
      $range = 2;
    }
    else if ($subnet == 32) {
      $range = 1;
    }
  return $range;
  }
?>
