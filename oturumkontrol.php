<?php 
		
	$veri=$_POST['karsi_taraf'];

		
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$conn = new mysqli($servername, $username, $password,$database);




$sorgu="SELECT * FROM baglanti WHERE ip='$veri' AND oturum='0'";


$result = $conn->query($sorgu);

if ($result->num_rows > 0) {
    echo "1";
} else {
   echo "0";
}



?>