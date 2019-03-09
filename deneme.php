<?php


	$veri=$_POST['ip_bilgisi'];
    $mesaj=$_POST['mesaj_bilgisi'];
	
	

$ip=get_client_ip_env();


$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));

	}

$sql = "INSERT INTO `mesajlar` VALUES ('$ip', '$veri','$mesaj')";
mysqli_query($con, $sql);

  echo $mesaj;
  

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