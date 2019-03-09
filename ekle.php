<?php

$ip=get_client_ip_env();

//echo $d;

$hint = "";
//Create connection
$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$secenek = $_REQUEST["q"];

$ayir=explode("-",$secenek);

$secenek=$ayir[0];

$parca=$ayir[1];

if(strcmp($secenek,"1")==0)
$result = mysqli_query($con,"UPDATE istekler SET cevap=1 WHERE konusulan= '".$ip."' AND konusan='".$parca."'");
if(strcmp($secenek,"0")==0)
$result = mysqli_query($con,"UPDATE istekler SET cevap=2 WHERE konusulan= '".$ip."' AND konusan='".$parca."'");

$hint=$parca;



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