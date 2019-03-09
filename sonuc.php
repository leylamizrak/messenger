<?php

$ip=get_client_ip_env();


$hint = "";
//Create connection
$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$konusan_kisi="";

$result = mysqli_query($con,"SELECT  * FROM `istekler` WHERE konusan = '".$ip."'");
		$row = $result->fetch_assoc();
if (mysqli_num_rows($result) > 0) 
	{	

		if($row["cevap"]==1)
		{

	$result2 = "DELETE FROM `istekler` WHERE konusan='".$ip."' "; 
	
if($con->query($result2)===TRUE){
	
	$nickal = mysqli_query($con,"SELECT  * FROM `baglanti` WHERE ip = '".$row["konusulan"]."'");
		$row2 = $nickal->fetch_assoc();
	$konusannick=$row2["nick"];
	$konusan_kisi=$row["konusulan"];
	
$hint="1"."-".$konusan_kisi."-".$konusannick;



}
else {
	$con->error;
	
}
	
	}
		else if($row["cevap"]==2) {
    
$hint="2"."-".""."-"."";


		
		}
}


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