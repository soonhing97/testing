<?php

function getIpRange(  $cidr) {

	//echo $cidr;
    list($ip, $mask) = explode('/', $cidr);

    $maskBinStr =str_repeat("1", $mask ) . str_repeat("0", 32-$mask );      //net mask binary string
    $inverseMaskBinStr = str_repeat("0", $mask ) . str_repeat("1",  32-$mask ); //inverse mask

    $ipLong = ip2long( $ip );
    $ipMaskLong = bindec( $maskBinStr );
    $inverseIpMaskLong = bindec( $inverseMaskBinStr );
    $netWork = $ipLong & $ipMaskLong; 

    $start = $netWork;//ignore network ID(eg: 192.168.1.0)

    $end = ($netWork | $inverseIpMaskLong)  ; //ignore brocast IP(eg: 192.168.1.255)


    return array('firstIP' => $start, 'lastIP' => $end );
}

function getEachIpInRange ( $cidr) {
    $ips = array();
    $range = getIpRange($cidr);

    for ($ip = $range['firstIP']; $ip <=$range['lastIP']; $ip++) {
        $ips[] = long2ip($ip);
        //echo "Hello World!";
    }

    return $ips;
}

     // $cidr = "10.197.3.117/30"; // max. 30 ips
     //  print_r(getEachIpInRange ( $cidr));
   // $array = getEachIpInRange ( $cidr);
   // echo end($array);




?>