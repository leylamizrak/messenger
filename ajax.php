<?php

$ip=get_client_ip_env();

//echo $d;

$hint = "";
//Create connection
$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$result = mysqli_query($con,"SELECT * FROM `istekler` WHERE konusulan = '".$ip."' AND cevap=0");

		$row = $result->fetch_assoc();

if (mysqli_num_rows($result) > 0) {
		$hint="1"."-".$row["konusan"];
}
else 	$hint="0"."-".$row["konusan"];

  


echo $hint === "" ? "no suggestion" : $hint;

function get_client_ip_env() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';

	return $ipaddress;
}


?>