<?php
include 'readln.php';
include 'find.php';
include 'range.php';
include_once 'compareNew.php';

function compare2result($IP, $IP1,$VPN,$VPN1)
{
    $notFound = [];
    $notFoundNew = array();
    $notFoundVPN = [];
    $notFoundVPN1 = [];
    $count =0;

	for($i=0;$i < sizeof($IP);$i++){
        //$ipEnd = $IP + $range -1;
		$hasFound = "false";
		$arrayCheck = array();
		$count++;

		for($j = 0; $j < sizeof($IP1) ; $j++){
            
		    if($IP[$i] == $IP1[$j] ){
				array_push($arrayCheck, "true");
				break;
			}
			elseif($IP[$i] != $IP1[$j] ){
				array_push($arrayCheck, "false");
			}
		
		}
		for ($k=0; $k<sizeof($arrayCheck); $k++) {
			if ($arrayCheck[$k] == "true") {
				$hasFound = "true";
			}
		}
		if ($hasFound == "false") {
			array_push($notFound, $IP[$i]);
			array_push($notFoundVPN1,$VPN[$i]);
		}
	}

$strAns1="";
	for($z=0;$z<sizeof($notFound);$z++){

		$found_8=explode("/",$notFound[$z]);
		if((int)$found_8[1] <=11){
			$strAns1 = $strAns1.$notFound[$z]."(Invalid Calculation [Mask < 11])"."<br>";
		}else{

			$expandIP = getEachIpInRange ($notFound[$z]);
			//echo $expandIP[$z];

			for($a=0;$a<sizeof($expandIP);$a++){
			$arrayCheckNew = array();
			//echo $expandIP[$a];
			$hasFoundNew ="false";

				for($y=0;$y<sizeof($IP1);$y++){
				$range=getSubnet($IP1[$y]);
				$ipStart = $IP1[$y];

					if(findIP($expandIP[$a],$ipStart,$range)){				
					array_push($arrayCheckNew,"true");
					break;
					}else{
					array_push($arrayCheckNew,"false");
					}

				}	
					for ($t=0;$t<sizeof($arrayCheckNew);$t++){
						if($arrayCheckNew[$t] =="true"){
						$hasFoundNew ="true";
						break;
						}
					}
						if($hasFoundNew == "false"){
						array_push($notFoundNew,$expandIP[$a]);
						array_push($notFoundVPN, $notFoundVPN1[$z]);
						echo $notFoundVPN1[$a];
						}
			}
		}
				
	}
	$newIP[0]=$notFoundNew;
	$newIP[1]=$notFoundVPN;
	$newIP[2]=$strAns1;
	return $newIP;
}

?>
   