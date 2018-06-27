<?php
include_once 'readln.php';
include_once 'compare.php';

function main_file($file1,$file2){
	//echo"hi!";
//echo sizeof($array);
$array = readIn($file1);
$IP = $array[0];
$VPN = $array[1];
$array1 = readIn($file2);
$IP1 = $array1[0];
$VPN1= $array1[1];
$strAns="";
$strAns2="";


$_1To2 = compare2result($IP,$IP1,$VPN,$VPN1);
$notFoundIP = $_1To2[0];
$notFoundVPN = $_1To2[1];
$strAns1=$_1To2[2];

if (sizeof($notFoundIP) > 0) {
	for ($i=0; $i<sizeof($notFoundIP); $i++) {
	$strAns= $strAns.$notFoundIP[$i]." is not found in file 2"."(".$notFoundVPN[$i].")"."<br>";
	}
	$strAns2=$strAns2.$strAns1;
}
else {
	return "Passed! Result Matched!";
}

$strAns3[0]=$strAns;
$strAns3[1]=$strAns2;
return $strAns3;
}

?>