<?php

if(isset($_POST['karsi_taraf'] )){

	$karsi_taraf=$_POST['karsi_taraf'];

$ip=get_client_ip_env();


$veri="";
	

$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));

	}

$sql = "SELECT * FROM `mesajlar` WHERE birinci='$karsi_taraf' AND ikinci='$ip'";

$result = mysqli_query($con,$sql);




if (mysqli_num_rows($result) > 0) {
while($row = $result->fetch_assoc()) {
		$veri=$veri.$row["mesaj"]."\n";

}

	$veri=substr($veri,0,-1);

$sql2 = "DELETE FROM `mesajlar` WHERE birinci='$karsi_taraf' AND ikinci='$ip'";

$result2 = mysqli_query($con,$sql2);

}



  

//$con->close();
echo $veri;
	 
	
  
}



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