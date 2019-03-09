	<?php 
		
		
		
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$conn = new mysqli($servername, $username, $password,$database);

$ip = get_client_ip_env();



$s = "UPDATE baglanti SET oturum='0' WHERE ip='$ip'";

if ($conn->query($s) === TRUE) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo"
<script type=\"text/javascript\">
		
	     location.href = \"nick.php\";
    
</script>
";

function get_client_ip_env() {
	
	if (getenv('HTTP_CLIENT_IP'))
		$ip = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ip = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ip = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ip = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ip = getenv('REMOTE_ADDR');
	else
		$ip = 'UNKNOWN';

	echo $ip;
	return $ip;
}


?>